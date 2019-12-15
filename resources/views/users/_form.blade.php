<form method="post" id="sample_form" class="form-horizontal">
        @csrf
        <div class="form-group">
        <label for="name" class="control-label col-md-4" > Name : </label>
        <div class="col-md-8">
            <input type="text" name="name" id="name" class="form-control" />
        </div>
        </div>
        <div class="form-group">
        <label for="email" class="control-label col-md-4">Email : </label>
        <div class="col-md-8">
            <input type="email" name="email" id="email" class="form-control" />
        </div>
        </div>
            <br />
            <div class="form-group" align="center">
                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
                <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
            </div>
</form>