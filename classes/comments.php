<?php
class comments extends ACore {

    protected $actionType = array(
        'addComment' => 'ajax',
    );

    protected function addComment() {
        $text_comment = mysql_real_escape_string($_POST['comment']);
        $id_text = mysql_real_escape_string($_POST['id_text']);

        if (empty($text_comment) || empty($id_text)) {
            echo ("Не заполнены обязательные поля");
            return;
        }
        $query = "INSERT INTO comments (`comment`,`ticket`) VALUES ('$text_comment','$id_text')";
        if (!mysql_query($query)) {
            exit (mysql_error());
        }
        else {
            $_SESSION['res'] = "Изменения сохранены";
        }

        echo json_encode(array('comments'=>$this->getCommentsBtTicket($id_text)));
        return false;
    }

    public function getCommentsBtTicket($ticketId) {
        $query = "select id,comment,ticket FROM comments WHERE ticket='$ticketId'";
        $result = '';
        $result_comment = mysql_query($query);
        $row = array();
        for ($i = 0; $i < mysql_num_rows($result_comment);$i++) {
            $row = mysql_fetch_assoc($result_comment);

            $result .= $row['comment'].'<br><hr>'.'';
            //echo 'комментариев :' . mysql_num_rows($result_comment);
        }

        $result .='<br><hr> Количество комментариев :' . mysql_num_rows($result_comment);
        $result .= '<form action="" id="form_comment"><textarea name="text_comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea><br><button class="btn btn-primary btn-lg" role="button" onclick="return comment_add('.$ticketId.')">Send</button></form>';
        return $result;
    }

}
?>