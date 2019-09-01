<?php
 
    class Paginator 
    {
    
        private $_conn;
        private $_limit;
        private $_page;
        private $_query;
        private $_total;
    
    

        function __construct( $conn, $query ) 
        {
            
            $this->_conn = $conn;
            $this->_query = $query;
        
            $rs= $this->_conn->query( $this->_query );
            $this->_total = $rs->num_rows;
            
        }

        function getData( $limit = 10, $page = 1 ) 
        {
        
            $this->_limit   = $limit;
            $this->_page    = $page;
        
            if ( $this->_limit == 'all' ) 
            {

                $query      = $this->_query;

            } 

            else 
            {

                $query      = $this->_query . " LIMIT " . ( ( $this->_page - 1 ) * $this->_limit ) . ", $this->_limit";
            
            }
            
            $rs             = $this->_conn->query( $query );
        
            while ( $row = $rs->fetch_assoc() ) 
            {

                $results[]  = $row;

            }
        
            $results[]  = $row;
            $result         = new stdClass();
            $result->page   = $this->_page;
            $result->limit  = $this->_limit;
            $result->total  = $this->_total;
            $result->data   = $results;
        
            return $result;
        }

        function createLinks( $links, $list_class ) 
        {

            if ( $this->_limit == 'all' ) 
            {

                return '';

            }
        
            $last       = ceil( $this->_total / $this->_limit );
        
            $start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
            $end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
        
            $class      = ( $this->_page == 1 ) ? "disabled" : "";
            $html       = '<a href="?limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a>';
        
            if ( $start > 1 ) 
            {

                $html   .= '<a href="?limit=' . $this->_limit . '&page=1">1</a>';
                $html   .= '<span>...</span>';
            
            }
        
            for ( $i = $start ; $i <= $end; $i++ ) 
            {

                $class  = ( $this->_page == $i ) ? "active" : "";
                $html   .= '<a href="?limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a>';
            
            }
        
            if ( $end < $last ) 
            {

                $html   .= '<span>...</span>';
                $html   .= '<a href="?limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a>';
            
            }
        
            $class      = ( $this->_page == $last ) ? "disabled" : "";
            $html       .= '<a href="?limit=' . $this->_limit . '&page=' . ( $this->_page + 1 ) . '">&raquo;</a>';
        
            return $html;

        }
    }

?>