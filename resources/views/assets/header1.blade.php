<header class="container1">
        <nav id="navbar">
            <div id="first">
                <div id="logo">
                </div>
                <ul>
                    <li class="item"><a href="" target="_blank"> Dashboard </a></li>
                    <li class="item"><a href="myorder.php" target="_blank"> My Order </a></li>
                </ul>
            </div>
            <div id="second">
                <ul>
                    <li class="list_btn" onclick="openPopup()">Home</li>
                    <li class="list_btn"> My Profile</li>
                    <li class="list_btn"> Contact US</li>
                    <a href="{{ route('app.homepage') }}"><li class="list_btn"> Logout </li></a>
                </ul>
            </div>

        </nav>
    </header>