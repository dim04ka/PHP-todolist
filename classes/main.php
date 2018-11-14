<?php 
class main extends ACore {

    protected $actionType = array(
        'addTicket' => 'without_template',
    );

    public function actionDefault(){

        $query = "select id,title,disc,date,inwork FROM ticket WHERE inwork='todo' OR inwork='0'  ORDER BY date DESC";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        echo '
                        <div class="mainblock main__todo">todo
                          <div class="main__todoBlock card bg-light mb-3">';

        $row = array();
        for ($i = 0; $i < mysql_num_rows($result);$i++) {
            $row = mysql_fetch_array($result,MYSQL_ASSOC);
            printf(
                ' 
                                <div class="todoBlock__text card-header">%s</div>
                                <div class="todoBlock__textarea">%s</div>
                                <div class="todoBlock__date"><p class="card-text"><small class="text-muted">%s</small></p></div>
                                <a href="#" onclick="return showWindow(%s)" class="btn btn-primary btn-lg" role="button">Редактирование</a>
                                <hr>
                            
                ',htmlspecialchars($row['title']),htmlspecialchars($row['disc']),htmlspecialchars($row['date']),htmlspecialchars($row['id']));

        }
        echo '</div></div>';

        $query = "select id,title,disc,date,inwork FROM ticket WHERE inwork='doing' OR inwork='1' ORDER BY date DESC";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        echo '
                        <div class="mainblock main__doing">doing
                          <div class="main__todoBlock card bg-light mb-3">';

        $row = array();
        for ($i = 0; $i < mysql_num_rows($result);$i++) {
            $row = mysql_fetch_array($result,MYSQL_ASSOC);
            printf(
                ' 
                                <div class="todoBlock__text card-header">%s</div>
                                <div class="todoBlock__textarea">%s</div>
                                <div class="todoBlock__date"><p class="card-text"><small class="text-muted">%s</small></p></div>
                                <a href="#" onclick="return showWindow(%s)" class="btn btn-primary btn-lg" role="button">Редактирование</a>
                                <hr>
                            
                ',htmlspecialchars($row['title']),htmlspecialchars($row['disc']),htmlspecialchars($row['date']),htmlspecialchars($row['id']));
        }
        echo '</div></div>';

        $query = "select id,title,disc,date,inwork FROM ticket WHERE inwork='done' OR inwork='2' ORDER BY date DESC";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        echo '
                        <div class="mainblock main__done">done
                          <div class="main__todoBlock card bg-light mb-3">';

        $row = array();
        for ($i = 0; $i < mysql_num_rows($result);$i++) {
            $row = mysql_fetch_array($result,MYSQL_ASSOC);
            printf(
                '
                                <div class="todoBlock__text card-header">%s</div>
                                <div class="todoBlock__textarea">%s</div>
                                <div class="todoBlock__date"><p class="card-text"><small class="text-muted">%s</small></p></div>
                                <a href="#" onclick="return showWindow(%s)" class="btn btn-primary btn-lg" role="button">Редактирование</a>
                                <hr>
                            
                ',htmlspecialchars($row['title']),htmlspecialchars($row['disc']),htmlspecialchars($row['date']),htmlspecialchars($row['id']));

        }
        echo '</div></div></section>';
    }

    protected function addTicket() {
        $title = mysql_real_escape_string($_POST['title']);
        $date = mysql_real_escape_string(date("Y-m-d H:i:s"));
        $disc = mysql_real_escape_string($_POST['disc']);
        $cat = mysql_real_escape_string($_POST['cat']);
        $id = intval($_POST['id']);
        if (empty($title) || empty($disc) || empty($cat)) {
            echo ("Не заполнены обязательные поля");
            return;
        }
        

        $query = "REPLACE ticket 
                    (`id`,`title`,`disc`,`date`,`inwork`)
                  VALUES ('$id','$title','$disc','$date','$cat')";
        if (!mysql_query($query)) {
            exit (mysql_error());
        }
        else {
            $_SESSION['res'] = "Изменения сохранены";
        }

        header('Location: ?option=main');
    }



}
?>