class File extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(string $uuid = '')
    {
        if (empty($uuid)) return $this->notFound();

        $file = $this->model->getFileByUuid($uuid);
        if (isset($file['error'])) {
            return $this->notFound();
        } 
        return $file;
    }
}
