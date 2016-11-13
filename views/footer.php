            </div>

            <div id="bottom">
                <?php if (!empty($_SESSION["id"])): ?>
                <div id=navigation-bar>
            <div class="navigat"><a href="index.php"><span class="glyphicon glyphicon-certificate"></span></a></div>
            <div class="navigat"><a  href="diary.php"><span class="glyphicon glyphicon-briefcase"></span></a></div>
            <div class="navigat"><a  href="ranking.php"><span class="glyphicon glyphicon-user"></span></a></div>
            <div class="navigat"><a  href="logout.php"><span class="glyphicon glyphicon-log-out"></span></a></div>
            
            </div>
            <?php endif ?>
            </div>

        </div>

    </body>

</html>
