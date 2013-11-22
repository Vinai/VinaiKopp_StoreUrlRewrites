<?php


class VinaiKopp_StoreUrlRewrites_Model_Url_Rewrite_Request
    extends Mage_Core_Model_Url_Rewrite_Request
{
    /**
     * Implement logic of custom rewrites
     * 
     * Bugfix rewrite
     *
     * @return bool
     */
    protected function _rewriteDb()
    {
        if (null === $this->_rewrite->getStoreId() || false === $this->_rewrite->getStoreId()) {
            $this->_rewrite->setStoreId($this->_app->getStore()->getId());
        }

        $requestCases = $this->_getRequestCases();
        $this->_rewrite->loadByRequestPath($requestCases);

        $fromStore = $this->_request->getQuery('___from_store');
        if (!$this->_rewrite->getId() && $fromStore) {
            
            //$stores = $this->_app->getStores();
            $stores = $this->_app->getStores(false, true); // BUGFIX 1
            if (!empty($stores[$fromStore])) {
                /** @var $store Mage_Core_Model_Store */
                $store = $stores[$fromStore];
                $fromStoreId = $store->getId();
            } else {
                return false;
            }

            $this->_rewrite->setStoreId($fromStoreId)->loadByRequestPath($requestCases);
            if (!$this->_rewrite->getId()) {
                return false;
            }

            // Load rewrite by id_path
            $currentStore = $this->_app->getStore();
            $this->_rewrite->setStoreId($currentStore->getId())->loadByIdPath($this->_rewrite->getIdPath());

            $this->_setStoreCodeCookie($currentStore->getCode());

            // BUGFIX 2
            //$targetUrl = $this->_request->getBaseUrl() . '/' . $this->_rewrite->getRequestPath();
            $targetUrl = $currentStore->getBaseUrl() . $this->_rewrite->getRequestPath();
            $this->_sendRedirectHeaders($targetUrl, true);
        }

        if (!$this->_rewrite->getId()) {
            return false;
        }

        $this->_request->setAlias(Mage_Core_Model_Url_Rewrite::REWRITE_REQUEST_PATH_ALIAS,
            $this->_rewrite->getRequestPath());
        $this->_processRedirectOptions();

        return true;
    }
} 