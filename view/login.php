<body>
    <main ontouchstart class="with-hover log">
        <aside>
            <div></div>
            <svg viewBox="0 0 100 100">
                <g stroke="#fff" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M65.892702,73 C70.3362168,68.5836139 73.0845878,62.4824333 73.0845878,55.7432553 C73.0845878,49.0040774 70.3362168,42.9028968 65.892702,38.4865107 C61.4491873,34.0701246 55.3105288,31.338533 48.5299539,31.338533 C41.749379,31.338533 35.6107205,34.0701246 31.1672058,38.4865107 C26.723691,42.9028968 23.97532,49.0040774 23.97532,55.7432553 C23.97532,62.4824333 26.723691,68.5836139 31.1672058,73 C31.1672058,73 65.892702,73 65.892702,73 Z M73.0594097,62.3985471 C76.4680437,61.2200182 88.5607213,56.1793944 85.5117743,37.8371245 L81.6924976,37.9360303 C80.8526284,43.134546 77.152648,46.6051883 72.4845099,46.6051883 M24.4062209,60.319036 C24.3904842,60.3191058 24.3747393,60.3191408 24.3589862,60.3191408 C18.6378761,60.3191408 14,55.70958 14,50.0233985 C14,44.3372171 18.6378761,39.7276563 24.3589862,39.7276563 C26.0569266,39.7276563 27.6594543,40.133673 29.0736464,40.8533508 M65.8946819,38.4867877 L31.1652244,38.4844448 M37.6782363,44.9577899 C34.9010396,47.7180312 33.1833077,51.5312691 33.1833077,55.7432553 C33.1833077,59.9552416 34.9010396,63.7684794 37.6782363,66.5287208 M45.4606247,29.0505903 L51.5992831,29.0505903 M48.5299539,26 L48.5299539,31.338533"></path>
                </g>
            </svg>
            <div>
                <p id="intro-signup" class="active">Welcome back to<br/><strong>CEC Canteen</strong>!</p>
            </div>
        </aside>
       <style>
        .vl {
  border-left: 1px solid white;
  height: 500px;
  margin-right:150px;
  margin-left:110px
}
</style>

<div class="vl"></div>
        <section>
            <h1>
                Log In
            </h1>
            <form id="form-signup" class="active" method="post">
                <div style="margin-top: 5.5rem;">
                    <?php if(isset($message)) :
                        if ($message=="Registered Successfully!") : ?>
                            <div class="alert alert-success" role="alert">
                                <?= $message ?>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                    <fieldset>
                        <div>
                            <label for="username">Username</label>
                            <input id="username" name="username" type="text" autofocus required/>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div>
                            <label for="password" >Password</label>
                            <input id="password" name="password" type="password" required/>
                        </div>
                    </fieldset>
                    <?php if(isset($message) && $message!="Registered Successfully!") :?>
                        <div class="alert alert-danger" role="alert">
                            <?= $message ?>
                        </div>
                    <?php endif ?>
                </div>
                <input type="hidden" name="action" value="login"/>
                <input type="submit" value="Log In"/>
            </form>
        </section>
    </main>


