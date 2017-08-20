 <form method="POST" action="/ajax/reg.php" id="regform">
                      
                            <div class="form-group">
                                <input id="name" name="NAME" type="text" class="form-control" placeholder="Ваше имя" >
                            </div>
                            <div class="form-group">
                                <input id="email" name="email" type="email" class="form-control" placeholder="Ваш e-mail">
                            </div>
                       
                            <input type="button" onclick="ajaxreg()" value="Готова!" class="btn btn-default btn-wd" /> 
                            
                        </form>
                        <div id="results"></div>