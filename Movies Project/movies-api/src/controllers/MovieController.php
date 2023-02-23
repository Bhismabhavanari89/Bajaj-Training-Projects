?php 

class MovieController
{
    private $movieGateway=null;
    public function __construct($gateway)
    {
        $this->movieGateway=$gateway;
    }

    public function handleRequest($method,$id)
    {
        if($id!==null)
        {
            $this->processResourceRequest($method,$id);
        }
        else 
        {
            $this->processRequest($method);
        }
    }


    public function processRequest($method)
    {

        switch($method)
        {
            case 'GET':{
                $response=$this->movieGateway->index();
                echo json_encode($response);
                break;
            }
            case 'POST':{
                $movie=(array)json_decode(file_get_contents('php://input'),true);
                $response=$this->movieGateway->create($movie);
                if($response)
                {
                    echo json_encode(array("success"=>true,"message"=>"Movie Created"));
                }
                else 
                {
                    echo json_encode(array("success"=>false,"message"=>"Some Problem"));                    
                }

                break;

            }
        }


    }

    public function processResourceRequest($method,$id)
    {
        switch($method)
        {
            case 'GET':{
                $response=$this->movieGateway->show($id);
                echo json_encode($response);
                break;
            }
            case 'PUT':{
                $movie=(array)json_decode(file_get_contents('php://input'),true);
                $response=$this->movieGateway->update($movie,$id);
                if($response)
                {
                    echo json_encode(array("success"=>true,"message"=>"Movie Updated"));
                }
                else 
                {
                    echo json_encode(array("success"=>false,"message"=>"Some Problem"));                    
                }

                break;

            }
            case 'DELETE':{
                $response=$this->movieGateway->delete($id);
                if($response)
                {
                    echo json_encode(array("success"=>true,"message"=>"Movie Deleted"));
                }
                else 
                {
                    echo json_encode(array("success"=>false,"message"=>"Some Problem"));                    
                }

                break;
            }
        }
    }


}