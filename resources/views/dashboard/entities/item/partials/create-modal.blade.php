<div class="modal fade" tabindex="-1" role="dialog" id="itemCreation">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Step</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ action('ItemController@store') }}">
                    {{ csrf_field() }}
                    <p>Define your process step below.</p>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="itemName">Item name</label>
                                <input type="text" name="itemName" id="itemName" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="itemAction">Item action</label>
                                <select name="itemAction" id="itemAction" class="form-control">
                                    <option value="click">Click</option>
                                    <option value="crawl">Crawl</option>
                                    <option value="fill">Fill</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="itemXpath">Item XPath (optional)</label>
                        <textarea name="itemXpath" id="itemXpath" cols="5" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="itemCssPath">Item CSS Path (optional)</label>
                        <textarea name="itemCssPath" id="itemCssPath" cols="5" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="offset-md-3"></div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Create</button>
                        </div>
                    </div>
                    <input type="hidden" name="crawlerID" value="{{ $crawler->id }}">
                </form>
            </div>
        </div>
    </div>
</div>
