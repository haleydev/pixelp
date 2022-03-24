<?php
namespace Core;

use Controller\View\ControllerError;

class App 
{    
    private $render; 
    private $view;
    private $file;
    private $valid = false;

    public function url(string $view, $render){
        if(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY) == NULL){
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                $this->view($view, $render);
             }
         } 
    }

    public function get(string $view, $render){      
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $this->view($view, $render);
        }
    }
    
    public function post(string $view, $render){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $this->view($view, $render);
        }
    }

    protected function view($view, $render){
        $get_url = filter_var(filter_input(INPUT_GET,"url", FILTER_DEFAULT),FILTER_SANITIZE_URL); 
        $this->view = $view;
        $this->render = $render;
        
        // id url code            
        $patternVariable = '/{(.*?)}/';
        if(preg_match_all($patternVariable,$this->view,$for_view)){ 
                            
            $array_url_view = explode('/',$this->view);
            $array_url_get = explode('/',$get_url); 

            if(count($array_url_view) == count($array_url_get) and !in_array(null,$array_url_get)){
                $new_url = "";
                
                foreach($for_view[0] as $variable){                    
                    if($new_url != null){
                        $array_url_view = explode('/',$new_url);
                    }

                    $url_key = array_search($variable, $array_url_view);
                    $key_view = $array_url_get[$url_key];

                    $replacement = array($url_key => $key_view);
                    $replace_array_url = array_replace($array_url_view, $replacement);
                    $new_url = implode("/", $replace_array_url); 

                    //define
                    $id_view = $array_url_view[$url_key];  
                    if(preg_match_all($patternVariable,$id_view,$define_view)){
                        $defid_url = $key_view;                        
                        define($define_view[1][0], $defid_url);
                    }                        
                }

                if($new_url == $get_url){
                    $this->view = $new_url;          
                }
            }                                
        }   
        
        if($this->view == $get_url){           
            if(is_callable($this->render)){
                // function detect                     
                call_user_func($this->render); 
                ob_end_flush();
                return $this->valid = true;
            }else{
                if(file_exists($this->render)){        
                    include $this->render;    
                    ob_end_flush();
                    return $this->valid = true;                           
                }
            }
        }        
    } 

    public function file(string $view,string $file){
        $this->file = $file;
        $this->render = $view;

        $url_file = filter_var(urldecode($_SERVER['REQUEST_URI']), FILTER_SANITIZE_URL); 
        if(file_exists($this->file) and $url_file == $this->render){            
            include_once $this->file;
            ob_end_flush();
            return $this->valid = true;
        }       
    }

    public function end(){
        if($this->valid == false){
            (new ControllerError)->render_error();
            ob_end_flush();  
            return $this->valid = true; 
            die;                 
        }
    }
}
