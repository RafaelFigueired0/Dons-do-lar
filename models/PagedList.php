<?php
class PagedList {
    private $items;
    private $totalResultsPages;



    public function __construct($items, $count)
    {
        $this->items = $items;
        $this->totalResultsPages = $count;

       
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotalPages()
    {
        return $this->totalResultsPages;
    }


 

}
?>