<style>
#right-nav{
    position: fixed;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    z-index: 999;
}

#right-nav ul{
    list-style-type: none;
}
#right-nav ul li{
margin-bottom: 1px;
    text-align: right;
}

#right-nav ul li:hover i{
    width: 46px;
    color: white;
}
#right-nav ul li i{
    cursor: pointer;
    color: white;
    transition: .3s;
    width: 36px;
    height: 36px;
    /*background-color: #002752;*/
    text-align: center;
    line-height: 36px;
}
</style>

<div id="right-nav" class="">
    <ul>
        <li><i class="fas fa-phone call-us-desk" style="background-color:red;"></i></li>
        <li><a href=""><i class="far fa-envelope" style="background-color:green;"></i></a></li>
        <li><a href=""><i class="fab fa-facebook-f" style="background-color:#002752;"></i></a></li>
        <li><a href=""><i class="fab fa-twitter" style="background-color:#007bff;"></i></a></li>
        <li><a href=""><i class="fab fa-google-plus-g" style="background-color:darkred;"></i></a></li>
    </ul>

</div>