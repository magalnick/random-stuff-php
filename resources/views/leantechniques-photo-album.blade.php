<div class="row">
    <div class="col">
        <p>Enter an album ID to view its photo list. Click the thumbnail to expand the full image.</p>
        <div class="mt-1">
            <input type="number" aria-label="Album ID" placeholder="Album ID" id="test-album-id" min="1" max="100" style="width: 100px;" />
        </div>
        <div class="mt-1">
            <button id="test-album-button" onclick="PhotoAlbum.getAlbum();">Get photos!</button>
        </div>
        <div class="mt-1">
            <div id="test-album-output"></div>
        </div>
    </div>
</div>

<div
    class="modal fade"
    id="test-album-modal"
    data-backdrop="static"
    tabindex="-1"
    aria-labelledby="test-album-modal-label"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="test-album-modal-label"></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col text-center" id="test-album-modal-display"></div>
                </div>
            </div>
        </div>
    </div>
</div>
