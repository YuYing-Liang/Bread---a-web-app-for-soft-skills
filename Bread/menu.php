<?php
require 'header.php';
require_once("connect-db.php");
session_start();
if (!isset($_SESSION["username"]))
{
    echo "<script type='text/javascript'> location.href='./index.php'; </script>";
}
head("Dashboard");

//PROCESSING
/*0 -> group
  1 -> question
  2 -> options
  3 -> $answer
  4 -> critical Thinking
  5 -> action
  */
$row;
$growth_skill;

$sql = "SELECT * FROM `networking` WHERE `row`= 1";
if($result=mysqli_query($dbLocalhost, $sql))
{
  $row = mysqli_fetch_row($result);
}

$q_options = explode("  ",$row[3]);
$username = $_SESSION["username"];

$str = <<<EOF

    <ul id="slide-out" class="sidenav">
      <li>
        <ul class="user-view">
          <li><img class="circle" src="images/placeholder.jpg"></li>
          <li>First name: John</li>
          <li>Last name: Doe</li>
          <li><a href="">linkedin profile</a></li>
        </ul>
      </li>
      <li><div class="divider"></div></li>
      <li><a href="">Settings</a></li>
      <li><a href="./index.php"> Log Out </a></li>
    </ul>

    <div id="dash">
      <a id="menuIcon" href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

      <div class="main">
        <div class="row">
          <div class="col s5 mobile-full-width">
            <center><div class='heading_center'>Welcome back, $username! Here are your challenges for the day:</div></center>
            <div class="row">
              <div class="col s12">
                <div class="card">
                  <div class="card-content">
                    <span class="card-title">Networking</span>
                    <p>$row[1]</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <table>
                <thead>
                  <tr>
                      <th data-field="id">Knowledge Question</th>
                      <th data-field="name">Answers:</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>$row[2]</td>
                    <td>
                      <div>
                       <p>
                         <label>
                           <input class="with-gap" name="group1" type="radio"/>
                           <span>$q_options[0]</span>
                         </label>
                       </p>
                       <p>
                         <label>
                           <input class="with-gap" name="group1" type="radio"  />
                           <span>$q_options[1]</span>
                         </label>
                       </p>
                       <p>
                         <label>
                           <input class="with-gap" name="group1" type="radio"  />
                           <span>$q_options[2]</span>
                         </label>
                       </p>
                       </div>
                       <div id="ans">
                         <h6> Answer: $row[4]</h6>
                       </div>
                       <button onclick="q_answer()"> Submit </button>
                   </td>
                  </tr>
                </tbody>
              </table>
            </div>
         </div>
        <div class="col s4 mobile-full-width">
          <div class="row col s12">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Critical Thinking Question</span>
                <p>$row[5]</p>
                <div>
          					<label for="username">Enter your response: </label>
          					<input class="usrNpas" type="text" name="response" id="response"/>
          					<button onclick="verify_ct()">Submit</button>
          			</div>
              </div>
            </div>
          </div>
          <div id="ans_ct" class="row col s12">
            <div class="card">
              <div class="card-content">
                <p> Nice job! <span class="material-icons">check_circle_outline</span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col s3 mobile-full-width">
          <div class="row col s12">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Progress</span>
                <ul class="collection">
                  <li class="collection-item">Challenge 1</li>
                  <li class="collection-item">Challenge 2</li>
                  <li class="collection-item">Challenge 3</li>
                  <li class="collection-item">Challenge 4</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
EOF;
echo $str;

  ?>
</body>
</html>
