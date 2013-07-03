<?php

/**
 * Description of Categories
 *
 * @author Stefanie Drost <stefaniedrost@gmx.de>
 * @package
 * @version 0.1.0
 */
class Sdrost_Responsive_Helper_Categories extends Mage_Core_Helper_Abstract
{
    public function getCategories()
    {
        $categories = array();
        
        // get all active categories
        $category = Mage::getModel('catalog/category');
        $tree = $category->getTreeModel();
        $tree->load();

        $ids = $tree->getCollection()->getAllIds();
        //$arr = array();

        // TODO: deaktivierte Kategorien nicht auslesen
        if ($ids) {
            foreach ($ids as $id) {
                $cat = Mage::getModel('catalog/category');
                $cat->load($id);
                if($cat->level == 2) {
                    array_push($categories, $cat);
                }
            }
        }
        
        return $categories;
    }
}
