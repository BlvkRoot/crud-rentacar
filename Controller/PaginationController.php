<?php
    class PaginationController
    {
        private $paginationRepository;
        private $totalPerPage;
        private $pageNumber;
        private $paginationControls;
        private $previous;
        private $next;

        function __construct()
        {
            $this->paginationRepository = new PaginationRepository();
            $this->totalPerPage = 6;  //limit per page
            $this->pageNumber = 1; //Initialize default page number
            $this->paginationControls = ''; //PaginationControls Variable
        }

        public function getRows()
        {
            return $this->paginationRepository->countCars();
        }

        public function lastPage()
        {
            $last_page = ceil($this->getRows() / $this->totalPerPage); //Page number of last page

            //ensure that our $last_page is not less than 1
            if($last_page < 1) 
                $last_page = 1;

            return $last_page;
        }

        //Check if page number is set in URL, else it is 1
        public function checkPage()
        {
            if(isset($_GET['page']))
            {
                $this->pageNumber = preg_replace('#[^0-9]#','' , $_GET['page']);
            }

            return $this->pageNumber;
        }

        //Check if pageNumber isn't below 1 and not greater than last page

        public function PageNumber()
        {
            if($this->checkPage() < 1)
            {
                $this->pageNumber = 1;

                //var_dump('Oi: ' , $this->lastPage()); die();
            }else if($this->checkPage() > $this->lastPage())
            {
                $this->pageNumber = $this->lastPage();
            }
            
            return $this->pageNumber;
        }

        public function getCars()
        {
            //Range of rows to query for page number

            $limit = 'LIMIT '.(($this->PageNumber() - 1) * $this->totalPerPage).',' . $this->totalPerPage;

            //Grab one page worth of rows applying $limit
            return $this->paginationRepository->getLimitedCars($limit);
        }

        /*public function buildPaginationControls()
        {
            // Only build controls if there is more than one page
            if($this->lastPage() != 1)
            {
                /*
                    first check if user is on page 1. Do nothing if its page 1.
                    Else generate Links to next page and previous page
                /
                // var_dump("I'm here"); die();
                return $this->next_previousPages();
                
            }
        }*/

        public function previous()
        {
            //BUILD PREVIOUS CLICKABLE LINKS

            $leftPageControl = '';

            if($this->lastPage() != 1)
            {
                if($this->PageNumber() > 1)
                {
                    $this->previous = $this->PageNumber() - 1;

                    $leftPageControl = '<a href=?page='.$this->previous.'>Previous </a>';

                    //Render clickable number links on the left
                    for($i = $this->PageNumber() - 4; $i < $this->PageNumber(); $i++)
                    {
                        if($i > 0)
                        {
                            // $leftPageControl = '<a href=?page='.$i.'>'.$i.'</a>';
                        }
                    }
                }
                //Render page number without it being a link
                $leftPageControl .= ''.$this->PageNumber().'';
            }
            return $leftPageControl;
        }

        public function next(){
            //BUILD NEXT CLICKABLE LINKS

            if($this->lastPage() != 1)
            {
                //Render clickable links that should appear on the right
                for($i = $this->pageNumber() + 1; $i <= $this->lastPage(); $i++)
                {
                    $this->paginationControls = '<a href=?page='.$i.'>'.$i.'</a>';

                    if($i >= $this->pageNumber() + 4)
                    {
                        break;
                    }
                }

                //Check if user is on the last page then generate next clickable links

                if($this->pageNumber() != $this->lastPage())
                {
                    $this->next = $this->pageNumber + 1;

                    $this->paginationControls = '<a href=?page='.$this->next.'>Next</a>';
                }
            }

            return $this->paginationControls;
        }

    }