<?php
class view extends ACore {
    protected $actionType = array(
        'actionDefault' => 'ajax',
    );

    public function actionDefault(){
        $error = '';

        if(!$_GET['id_text']) {
            $error = "Не правильные данные для вызова тикета";
        } else {
            $id_text = (int) $_GET['id_text'];

            if ($id_text) {
                $query = "select title,disc,inwork FROM ticket WHERE id='$id_text'";
                $result = mysql_fetch_assoc(mysql_query($query));
                if (!$result) {
                    exit(mysql_error());
                }
                include_once('classes/comments.php');
                $Comments = new Comments();
                $result['comments'] = $Comments->getCommentsBtTicket($id_text);
                echo json_encode($result);
            }
        }

    }
}
?>