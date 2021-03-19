<?php

namespace PrestaShop\Modules\ShopWebService\Classes;



class CrudHelper {

  var $__method = null;
  var $__route = null;

    /**
     * CrudHelper constructor.
     * @param string $method
     * @param string $slug
     */
    function __construct(string $method, string $slug) {
        $this->__method = $method;
        $this->__route = explode('/',$slug);
        $this->__route = explode('&', $this->__route[3]);
        $oi = strpos($this->__route[0],'?')+1;
        $this->__route[0] = substr($this->__route[0],$oi,strlen($this->__route[0]));
        if(!$this->authorize()) {
          $this->__route = null;
          $this->__method = null;
        }
    }

    /**
     * @return array|bool|mixed|string|string[]|null
     */
    public function handleRoute() {
        switch ($this->__method) {
          case 'GET':
            $getter = new GetHandler($this->__route);
            $res = $getter->handleRoute();
            break;
          case 'POST':
            $poster = new PostHandler($this->__route);
            $res = $poster->handleRoute();
            break;
          case 'PUT':
            parse_str(file_get_contents('php://input', false , null, 0 , $_SERVER['CONTENT_LENGTH'] ), $_PUT);
            $putter = new PutHandler($this->__route, $_PUT);
            $res = $putter->handleRoute();
            break;
          case "DELETE":
            parse_str(file_get_contents('php://input', false , null, 0 , intval($_SERVER['CONTENT_LENGTH']) ), $_DELETE);
            $deleter = new DeleteHandler($this->__route, $_DELETE);
            $res = $deleter->handleRoute();
            break;
          case 'PATCH':
            parse_str(file_get_contents('php://input', false , null, 0 , $_SERVER['CONTENT_LENGTH'] ), $_PATCH);
            $patcher = new PatchHandler($this->__route, $_PATCH);
            $res = $patcher->handleRoute();
            break;
          default:
            $rsp = "You are not allowed further! ";
            $rsp .= "If you need further assistance, please contact PrestaChamps!";
            return array("REQUEST ERROR!"=>$rsp);
            break;
        }
        if($res==true || $res==1) {
            $res = array("Response"=>"Your operation went successfully!");
        }
        return $res;
  }


    /**
     * @return bool
     */
    private function authorize(): bool
    {
        $h = getallheaders();
        if(isset($h["Authorization"]) &&
            $h['Authorization']==="SQKCNVZGA67ZY7CTPZQ7GDLJXHCLPTAX") {
          return true;
        } else if(
            in_array('Authorization=SQKCNVZGA67ZY7CTPZQ7GDLJXHCLPTAX',$this->__route)
          ) {
            $key = array_keys($this->__route,'Authorization=SQKCNVZGA67ZY7CTPZQ7GDLJXHCLPTAX');
            unset($this->__route[$key[0]]);
            return true;
        } else {
          return false;
        }
    }
}
