<?php
    $stime = microtime(true);
    // 加载数据库配置文件
    include_once('mysql_config.php');
    // 接收数据信息,通过$_SERVER["REQUEST_METHOD"]验证表单是否通过POST方式提交，对表单进行验证，
    // 再通过自定义的test_input函数处理提交的数据，提高安全性，删除不必要的字符。
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $shixian = test_input($_POST['shixian']);
        $zpdw = test_input($_POST['zpdw']);
        $xueduan = test_input($_POST['xueduan']);
        $xueke = test_input($_POST['xueke']);
        $str = test_input($_POST['str']);
    }
      function test_input($data)
      {
          // 通过 PHP trim() 函数去除用户输入数据中不必要的字符（多余的空格、制表符、换行）
          // 通过 PHP stripslashes() 函数删除用户输入数据中的反斜杠（\）
          // htmlspecialchars() 函数把特殊字符转换为 HTML 实体。这意味着 < 和 > 之类的 HTML 字符会被替换为 &lt; 和 &gt; 。
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          $data = strip_tags($data);
          return $data;
      }
      $sql_shixian = "";
      $sql_zpdw = "";
      $sql_xueduan = "";
      $sql_xueke = "";
      $where = "";
      $and1 = "";
      $and2 = "";
      $and3 = "";
    //   执行 报考地区 的查询
      if ($str == "shixian") {
          if ($zpdw != "不限"&&$zpdw != null) {
              $sql_zpdw = "zpdw = '$zpdw'";
          };
          if ($xueduan != "不限"&&$xueduan != null) {
              $sql_xueduan = "xueduan = '$xueduan'";
          };
          if ($xueke != "不限"&&$xueke != null) {
              $sql_xueke = "xueke = '$xueke'";
          };
          if ($sql_zpdw||$sql_xueduan||$sql_xueke) {
              $where = "WHERE";
          };
          if ($sql_zpdw&&$sql_xueduan) {
              $and1 = "and";
          };
          if ($sql_xueduan&&$sql_xueke) {
              $and2 = "and";
          };
          if ($sql_zpdw&&$sql_xueke) {
              $and2 = "and";
          };
          $sql="SELECT DISTINCT(shixian) FROM hs_2016fsx $where $sql_zpdw $and1 $sql_xueduan $and2 $sql_xueke";
          echo "<option>不限</option>";
          $result = mysql_query($sql, $con);
          while ($row = mysql_fetch_array($result)) {
              echo "<option>" . $row[0] . "</option>";
          }
      }

      //   执行 招聘单位 的查询
      if ($str == "zpdw") {
          if ($shixian != "不限") {
              $sql_shixian = "shixian = '$shixian'";
          };
          if ($xueduan != "不限") {
              $sql_xueduan = "xueduan = '$xueduan'";
          };
          if ($xueke != "不限") {
              $sql_xueke = "xueke = '$xueke'";
          };
          if ($sql_shixian||$sql_xueduan||$sql_xueke) {
              $where = "WHERE";
          };
          if ($sql_shixian&&$sql_xueduan) {
              $and1 = "and";
          };
          if ($sql_xueduan&&$sql_xueke) {
              $and2 = "and";
          };
          if ($sql_shixian&&$sql_xueke) {
              $and2 = "and";
          };
          $sql="SELECT DISTINCT(zpdw) FROM hs_2016fsx $where $sql_shixian $and1 $sql_xueduan $and2 $sql_xueke";
          $result = mysql_query($sql, $con);
          echo "<option>不限</option>";
          while ($row = mysql_fetch_array($result)) {
              echo "<option>" . $row[0] . "</option>";
          }
      }

      //   执行 学段 的查询
      if ($str == "xueduan") {
          if ($shixian != "不限") {
              $sql_shixian = "shixian = '$shixian'";
          };
          if ($zpdw != "不限") {
              $sql_zpdw = "zpdw = '$zpdw'";
          };
          if ($xueke != "不限") {
              $sql_xueke = "xueke = '$xueke'";
          };
          if ($sql_shixian||$sql_zpdw||$sql_xueke) {
              $where = "WHERE";
          };
          if ($sql_shixian&&$sql_zpdw) {
              $and1 = "and";
          };
          if ($sql_zpdw&&$sql_xueke) {
              $and2 = "and";
          };
          if ($sql_shixian&&$sql_xueke) {
              $and2 = "and";
          };
          $sql="SELECT DISTINCT(xueduan) FROM hs_2016fsx $where $sql_shixian $and1 $sql_zpdw $and2 $sql_xueke";
          $result = mysql_query($sql, $con);
          echo "<option>不限</option>";
          while ($row = mysql_fetch_array($result)) {
              echo "<option>" . $row[0] . "</option>";
          }
      }

      //   执行 学科 的查询
      if ($str == "xueke") {
          if ($shixian != "不限") {
              $sql_shixian = "shixian = '$shixian'";
          };
          if ($zpdw != "不限") {
              $sql_zpdw = "zpdw = '$zpdw'";
          };
          if ($xueduan != "不限") {
              $sql_xueduan = "xueduan = '$xueduan'";
          };
          if ($sql_shixian||$sql_zpdw||$sql_xueduan) {
              $where = "WHERE";
          };
          if ($sql_shixian&&$sql_zpdw) {
              $and1 = "and";
          };
          if ($sql_zpdw&&$sql_xueduan) {
              $and2 = "and";
          };
          if ($sql_shixian&&$sql_xueduan) {
              $and2 = "and";
          };
          $sql="SELECT DISTINCT(xueke) FROM hs_2016fsx $where $sql_shixian $and1 $sql_zpdw $and2 $sql_xueduan";
          $result = mysql_query($sql, $con);
          echo "<option>不限</option>";
          while ($row = mysql_fetch_array($result)) {
              echo "<option>" . $row[0] . "</option>";
          }
      }
      $chaxun_error = "";
    // 查询信息
    if ($str == "chaxun") {
        if ($shixian != "不限") {
            $sql_shixian = "shixian = '$shixian'";
        };
        if ($zpdw != "不限") {
            $sql_zpdw = "zpdw = '$zpdw'";
        };
        if ($xueduan != "不限") {
            $sql_xueduan = "xueduan = '$xueduan'";
        };
        if ($xueke != "不限") {
            $sql_xueke = "xueke = '$xueke'";
        };
        if ($sql_shixian||$sql_zpdw||$sql_xueduan||$sql_xueke) {
            $where = "WHERE";
        };
        if ($sql_shixian&&$sql_zpdw) {
            $and1 = "and";
        };
        if ($sql_shixian&&$sql_xueduan) {
            $and2 = "and";
        };
        if ($sql_shixian&&$sql_xueke) {
            $and3 = "and";
        };
        if ($sql_zpdw&&$sql_xueduan) {
            $and2 = "and";
        };
        if ($sql_zpdw&&$sql_xueke) {
            $and3 = "and";
        };
        if ($sql_xueduan&&$sql_xueke) {
            $and3 = "and";
        };
        if ($sql_shixian||$sql_zpdw||$sql_xueduan||$sql_xueke) {
            $sql="SELECT * FROM hs_2016fsx $where $sql_shixian $and1 $sql_zpdw $and2 $sql_xueduan $and3 $sql_xueke";
        } else {
            echo "sql_error";
            die;
        }
        $result = mysql_query($sql, $con);
        // 通过mysql_num_rows()函数获取sql查询得到的行数，如果行数少于1，则判定未查询到信息并返回一个字符串，方便前端进行提示！
        if (mysql_num_rows($result)<1) {
            // $query_error变量用于后面显示页面执行时间的判断查询，如果为1，则不显示执行时间内容显示。
            $chaxun_error = 1;
            echo 'chaxun_error';
            die;
        } else {
            // <tbody id='itemContainer'>的id属性为分页识别的位置，此处下面应该为循环的列表。
            echo "<table class='table table-bordered table-hover table-striped text-center' >
            <tr>
            <th>报考地区</th>
            <th>招聘单位</th>
            <th>学段</th>
            <th>学科</th>
            <th>招聘人数</th>
            <th>分数</th>
            <th>查看</th>
            </tr><tbody id='itemContainer'>";
            // 通过mysql_fetch_array()函数把数据库获取的数据通过数组的形式输出
            while ($row = mysql_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . $row[4] . "</td>";
                echo "<td>" . $row[5] . "</td>";
                echo "<td>" . $row[6] . "</td>";
                echo "<td><button class='btn btn-info' value='chakan' onclick='setQuery(this.value,".$row[0].")'>查看</button>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        }
    };
    mysql_close($con);
    $etime = microtime(true);
    $total = $etime-$stime;
    if ($str == "chaxun" && $chaxun_error != 1) {
        echo "<div class='text-center'>页面执行时间: ".$total." 秒</div>";
    }
