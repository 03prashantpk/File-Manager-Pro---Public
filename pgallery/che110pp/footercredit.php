<!---- Footer ---------->
<footer id="footer" class="d-flex-column overlap" >
    <div class="over">
        <!-- <hr class="mt-0"> -->
        <!--Social buttons-->


        <!--/.Footer Links-->
        <hr class="mb-0">
        <!--Copyright-->
        <div class="py-3 " style="background-color: #DBE2EF; padding: 0% 4%">
            <div>
                <h5>You Can Find Me At</h5>
                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/Prashant96120Pk/" class="sbtn btn-large mx-1" title="Facebook">
                            <i class="lni lni-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.linkedin.com/in/03prashantpk/" class="sbtn btn-large mx-1" title="Linkedin">
                            <i class="lni lni-linkedin"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/03prashantpk/" class="sbtn btn-large mx-1" title="GitHub">
                            <i class="lni lni-github"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/prashantpkumar/" class="sbtn btn-large mx-1" title="Youtube">
                            <i class="lni lni-instagram"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.youtube.com/channel/UCUh3A9fQkuTRtmVVRf3O_Ng" class="sbtn btn-large mx-1" title="Youtube">
                            <span class="iconify" data-icon="logos:youtube" data-width="80"></span>
                        </a>
                    </li>
                </ul>
                <p>*New: <a  target="_blank" href="https://enally.in/files-manager/subscribe-us">Subscribe <span class="iconify" data-icon="ic:baseline-open-in-new"></span></a></p>
            </div>If you find any bugs or irrelevant stuff. Please report it here <a href="https://enally.in/files-manager/contact">Contact or Report Bugs</a><br>
            Developed By <b> <span id="CName"> Prashant Kumar </span> </b> <br> <?php echo date("Y") ?> © Enally.in <i class="lni lni-friendly"></i>


            <br><br>
        </div>

        <!--/.Copyright-->
    </div>
</footer>
<!-- <h5 class="resize"><i class="fas fa-angle-double-left"></i>Resize screen<i class="fas fa-angle-double-right"></i> -->
<!-- Redirect in few min inactivity ---->
<script type="text/javascript">
    function Redirect() {
        window.location = "https://enally.in/files-manager/lock";
    }
    document.write("");
    setTimeout('Redirect()', 910000);
</script>

<script>
    
$(function(){
    if ($(window).width()<1200){
        $(".nav-items-container ").slideUp(0,"swing")
        $(".log-btns-container ").slideUp(0,"swing")
    }
})


$(".hamburger").click(function(){
    $(".hamburger").toggleClass("open")
    $(".nav-items-container").slideToggle(300,"swing")
    $(".log-btns-container").slideToggle(300,"swing")
})

$(window).resize(function(){
    $(".hamburger").removeClass("open")

})

$(window).resize(function() {
    if ($(window).width()>1200){
        $(".nav-items-container").slideDown(300,"swing")
        $(".log-btns-container").slideDown(300,"swing")
        // $(".hamburger").toggleClass("open")
    }

  });
  $(window).resize(function() {
    if ($(window).width()<1200){
        $(".nav-items-container ").slideUp(0,"swing")
        $(".log-btns-container ").slideUp(0,"swing")
    }

  });


</script>