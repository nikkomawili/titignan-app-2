<?php
  session_start();
?>

<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="timescript.js"></script>
    <style>
    /* style when project is started */
    .started {
        color: white;
        font-weight: bold;
        background: green;
        padding: 5px;
        border-radius: 5px;
    }

    /* style when project is completed */
    .completed {
        color: white;
        font-weight: bold;
        background: greenyellow;
        padding: 5px;
        border-radius: 5px;
    }
</style>
<!-- to make responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- include bootstrap css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />

<!-- include jquery and bootstrap js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- include sweetalert for displaying dialog messages -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- SECTION 3 Header -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

   </head>
<body>

<div class="container">

  <div class="one">
    
      <!--<li><a href="#">Dashboard</a></li>
      <li class="center"><a href="#">Portfolio</a></li>
      <li class="upward"><a href="#">Services</a></li>
      <li class="forward"><a href="#">Feedback</a></li>-->
      <?php if (isset($_SESSION["userid"]))
        {
      ?>
      <ul class="nav-links">
        <li><a href="#section1">Dashboard</a></li>
        <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
        <li><a href="includes/logout.inc.php">Logout</a></li>
      </ul>
      <?php
        }
        else
        {
      ?>
        <!--<li><a href="#">Sign Up</a></li>
        <li><a href="#">Login</a></li>-->
      <?php
        }
      ?>
    
  </div>

  <!-- SECTION 2 -->
  <div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    
    <!-- button to add task -->
    <div class="row" style="margin-bottom: 50px;">
        <div class="col-md-12" >
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTaskModal" >Add Task</button>
            
            <!-- form to delete project -->
            <form method="POST" onsubmit="return taskObj.deleteProject(this);" style="display: contents;">
                <select name="project" class="form-control" style="display: initial; width: 200px; margin-left: 5px; margin-right: 5px;" id="form-task-hour-calculator-all-projects"></select>
                <input type="submit" class="btn btn-danger" value="Delete Project">
            </form>
        </div>
    </div>

    <!-- show all tasks -->
    <table class="table">
        <caption class="text-center">All Tasks</caption>
        <tr>
            <th>Task</th>
            <th>Project</th>
            <th>Status</th>
            <th>Duration</th>
            <th>Date</th>
            <th>Countdown</th>
            <th>Action</th>
        </tr>

        <tbody id="all-tasks"></tbody>
    </table>
</div>

<!-- modal to add project and task -->
<div class="modal fade" id="addTaskModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Task</h5>
                <button class="close" type="button" data-dismiss="modal">x</button>
            </div>

            <div class="modal-body">
                <form method="POST" onsubmit="return taskObj.addTask(this);" id="form-task-hour-calculator">
                    
                    <!-- select project from already created -->
                    <div class="form-group">
                        <label>Project</label>
                        <select name="project" id="add-task-project" class="form-control" required></select>
                    </div>

                    <!-- create new project -->
                    <div class="form-group">
                        <label>New Project</label>
                        <input type="text" name="new_project" id="add-project" class="form-control" placeholder="Project Name">

                        <button type="button" onclick="taskObj.addProject();" class="btn btn-primary" style="margin-top: 10px;">Add Project</button>
                    </div>

                    <!-- enter task -->
                    <div class="form-group">
                        <label>Task</label>
                        <input type="text" name="task" class="form-control" placeholder="What are you going to do ?" required />
                    </div>
                </form>
            </div>

            <!-- form submit button -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="form-task-hour-calculator" class="btn btn-primary">Add Task</button>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 3 -->

<div class="container" style="min-height:500px;">		
		<h2></h2>		
		<br>		
		<form method="POST" id="commentForm">
			<div class="form-group">
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required />
			</div>
			<div class="form-group">
				<textarea name="comment" id="comment" class="form-control" placeholder="Enter Comment" rows="5" required></textarea>
			</div>
			<span id="message"></span>
			<br>
			<div class="form-group">
				<input type="hidden" name="commentId" id="commentId" value="0" />
				<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Post Comment" />
			</div>
		</form>		
		<br>
		<div id="showComments"></div>   
</div>	

</body>
</html>