<!-- register Modal --><form class="modal LoginFormClient fade" id="LoginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">    <div class="modal-dialog modal-dialog-centered">        <div class="modal-content">            <div class="modal-header">                <h1  class="modal-title fs-5 text-muted" id="messageCon">Login</h1>                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>            </div>            <div class="modal-body">                <div class="form-floating mb-3">                    <input type="text" class="form-control" name="usernameLogin" id="usernameLogin">                    <label for="usernameLogin">username</label>                </div>                <div class="form-floating mb-3">                    <input autocomplete="password" type="password" class="form-control" name="passwordLogin" id="passwordLogin">                    <label for="passwordLogin">password</label>                </div>            </div>            <div class="modal-footer">                <button type="button" class="btn" data-bs-dismiss="modal">Close</button>                <button id="btn_login" type="submit" class="btn">Sign In</button>            </div>        </div>    </div></form>