<?

class User {
    public $first;
    public $last;
    public $email;
    public $status;
 
    function __construct($first,$last,$email,$status) {
        $this->first = $first;
        $this->last = $last;
        $this->email = $email;
        $this->status = $status;
    }

}
?>