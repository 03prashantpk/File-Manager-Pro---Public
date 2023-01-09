</body>
<script type="text/javascript">
</script>


<script type="text/javascript">
    /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>


<!---- Delete script ----->
<script type="text/javascript">
    /* /*$(document).ready(function() {
        $('.btn-success').click(function() {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to delete this Member?")) {
                $.ajax({
                    type: "POST",
                    url: "delete.php",
                    data: ({
                        id: id
                    }),
                    cache: false,
                    success: function(html) {}
                });
            } else { 
                return false;
            }
        });
    }); */
</script>

<!-----Onclick Delete WIthout Page reload Using Ajax---------->
<script>
    $(document).ready(function() {
        $.ajax({
            url: "View_ajax.php",
            type: "POST",
            cache: false,
            success: function(dataResult) {
                $('#table').html(dataResult);
            }
        });
        $(document).on("click", ".delete", function() {
            var $ele = $(this).parent().parent();
            $.ajax({
                url: "delete_ajax.php",
                type: "POST",
                cache: false,
                data: {
                    id: $(this).attr("data-id")
                },
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $ele.fadeOut().remove();
                    }
                }
            });
        });
    });
</script>

<!-----Onclick Increase download count Without Page reload Using Ajax---------->
<script>
    $(document).ready(function() {
        $.ajax({
            url: "View_ajax.php",
            type: "POST",
            cache: false,
            success: function(dataResult) {
                $('#table').html(dataResult);
            }
        });
        $(document).on("click", ".count", function() {
            var $ele = $(this).parent().parent();
            $.ajax({
                url: "count_ajax.php",
                type: "POST",
                cache: false,
                data: {
                    id: $(this).attr("data-id")
                },
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $ele.fadeOut().remove();
                    }
                    //alert("Deleted");
                }
            });
        });
    });
</script>

<!--- Refresh Content without Relaoding page using div ---->
<script language="javascript" type="text/javascript">
    var timeout = setInterval(reloadChat, 15000);

    function reloadChat() {

        $('#totalpg').load('totalpageview.php');
    }
</script>

<!--- Refresh Content without Relaoding page using div ---->
<script language="javascript" type="text/javascript">
    //var timeout = setInterval(reloadChat, 10000);

    //function reloadChat() {

    //  $('#content').load('main.php');
    //}
</script>

<script>
    //     $(function() {
    //     startRefresh();
    // });

    // function startRefresh() {
    //     setTimeout(startRefresh,10000);
    //     $.get('main.php', function(data) {
    //         $('#content').html(data);    
    //     });
    // }
</script>

<script>
    setInterval(abc, 10000);

    function abc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "main.php", true);
        xhttp.send();
    }
</script>

<script>
    AOS.init();
</script>

</html>