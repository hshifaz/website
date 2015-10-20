<html>
<head>
    <title>To-do List Application</title>
    <link rel="stylesheet" href="/stelco_website/public/assets/css/style.css">
    <!--[if lt IE 9]><scriptsrc="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>
<body>
<div class="container">
    <section id="data_section" class="todo">
        <ul class="todo-controls">
            <li><a href="#" onclick="show_form('add_task');">Add Task</a></li>
        </ul>
        <ul id="task_list" class="todo-list">
            @foreach($contentFiles as $contentFile)
                    <li id="{{$contentFile->id}}"><a href="#"></a><span id="span_{{$contentFile->id}}">{{$contentFile->desc}}</span>
                        <a href="#"onClick="delete_task('{{$contentFile->id}}');"class="icon-delete">Delete</a>
                        <a href="#"onClick="edit_task('{{$contentFile->id}}','{{$contentFile->desc}}');"class="icon-edit">Edit</a></li>
            @endforeach
        </ul>
    </section>
    <section id="form_section">

        <form id="add_task" class="todo"
              style="display:none">
            <input id="task_title" type="text" name="title"placeholder="Enter a task name" value=""/>
            <button name="submit">Add Task</button>
        </form>

        <form id="edit_task" class="todo"style="display:none">
            <input id="edit_task_id" type="hidden" value="" />
            <input id="edit_task_title" type="text"name="title" value="" />
            <button name="submit">Edit Task</button>
        </form>

    </section>

</div>
<script src="http://code.jquery.com/jquery-latest.min.js"type="text/javascript"></script>
<script src="/stelco_website/public/assets/js/contentFile.js"type="text/javascript"></script>
</body>
</html>