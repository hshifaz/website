$.ajaxSetup(
{
    headers:
    {
        'X-CSRF-Token': $('input[name="_token"]').val()
    }
});

$(function(){

    $('.push').click(function(ev){

        ev.preventDefault();

        var _id = $('#id').val();


        $data = "{'_token':'"+ document.getElementsByName("_token")[0].value +"','id':'" + $('#id').val() + "'}";
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "../attachments?id=" + _id,  // <<<< change this to named routes
            async:false,
            success: function (data) {

                var contents = "<div class='bs-example' data-example-id='thumbnails-with-custom-content'>"+
                    "<div class='row'>";

                var sid = data['service']['id'];

                $.each( data['contents'], function( k,v ) {
                    var id,desc,link;
                    $.each( v, function( key, value ) {

                        switch(key) {
                            case 'id':
                                id = value;
                                break;
                            case 'desc':
                                desc = value;
                                break;
                            case 'link':
                                link = value;
                                break;
                            default:
                            break;
                        }
                    });

                    contents += "<div class='col-sm-6 col-md-4'>"+
                        "<div class='thumbnail'>"+
                        "<img src='http://localhost:1234/stelco_website/public/images/"+link+"' alt='...'>"+
                        "<div class='caption'>"+
                    "<p>"+desc+"</p>"+
                    "<p><a href='#' class='btn btn-primary' onclick='bindAttachement("+sid+","+id+");' role='button'>Button</a></p>"+
                    "</div>"+
                    "</div>"+
                    "</div>";
                });
                contents += "</div></div>";

                document.getElementById('contents').innerHTML = "<div class='modal-dialog' role='document'>"+
                    "<div class='modal-content'>"+
                    "<div class='modal-header'>"+
                    "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+
                "<h4 class='modal-title' id='contentLabel'>Select Content</h4>"+
                "</div>"+
                "<div class='modal-body'>"+contents+
                "</div>"+
                "<div class='modal-footer'>"+
                    "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>"+
                    "<button type='button' class='btn btn-primary'>Save changes</button>"+
                "</div>"+
                "</div>"+
                "</div>";
                $('#contents').modal('show');

            },
            error: function (jqXHR, textStatus, errorThrown) {
                // capture error here
                alert(errorThrown + " : " + textStatus);
            }
        });
    });

});

function bindAttachement(sid,cid){

    $('#contents').modal('hide');
    $data = "{'_token':'"+ document.getElementsByName("_token")[0].value +"','id':" + sid + ",'cid':"+cid+"}";
    $.ajax({
        type: "POST",
        contentType: "application/json; charset=utf-8",
        url: "../"+sid+"/contentFiles/"+cid,
        data: $data,
        async:false,
        success: function (data) {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // capture error here
            alert(errorThrown + " : " + textStatus);
        }
    });
}

function task_done(id){

    $.get("/done/"+id, function(data) {

        if(data=="OK"){

            $("#"+id).addClass("done");
        }

    });
}
function delete_task(id){

    $.get("/delete/"+id, function(data) {

        if(data=="OK"){
            var target = $("#"+id);

            target.hide('slow', function(){ target.remove(); });

        }

    });
}


function show_form(form_id){

    //$("form").hide();


    $('#'+form_id).show("slow");

}
function edit_task(id,title){

    $("#edit_task_id").val(id);

    $("#edit_task_title").val(title);

    show_form('edit_task');
}
$('#add_task').submit(function(event) {

    /* stop form from submitting normally */
    event.preventDefault();

    var title = $('#task_title').val();
    if(title){
        //ajax post the form
        $.post("/add", {title: title}).done(function(data) {

            $('#add_task').hide("slow");
            $("#task_list").append(data);
        });

    }
    else{
        alert("Please give a title to task");
    }
});

$('#edit_task').submit(function() {

    /* stop form from submitting normally */
    event.preventDefault();

    var task_id = $('#edit_task_id').val();
    var title = $('#edit_task_title').val();
    var current_title = $("#span_"+task_id).text();
    var new_title = current_title.replace(current_title, title);
    if(title){
        //ajax post the form
        $.post("/update/"+task_id, {title: title}).done(function(data){
            $('#edit_task').hide("slow");
            $("#span_"+task_id).text(new_title);
        });
    }
    else{
        alert("Please give a title to task");
    }
});