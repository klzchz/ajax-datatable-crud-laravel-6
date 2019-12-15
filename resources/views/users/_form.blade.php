<form method="post" id="user_form" class="form-horizontal">
        @csrf

    <div class="form-group">
    <label for="name" class="control-label col-md-4" > Name : </label>
    <div class="col-md-12">
        <input type="text" name="name" id="name" class="form-control" />
    </div>
    </div>

    <div class="form-group my-2">
    <label for="email" class="control-label col-md-4">Email : </label>
    <div class="col-md-12">
        <input type="email" name="email" id="email" class="form-control" />
    </div>

    <div id="pass" class="form-group my-2">
    <label for="password" class="control-label col-md-4">Password : </label>

    <div class="col-md-12">
        <input type="password" name="password" id="password" class="form-control"/>
    </div>

    </div>
        <br />
        <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" value="Add" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
        </div>
</form>