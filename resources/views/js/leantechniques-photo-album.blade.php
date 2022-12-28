<script>
    // use this as a security feature so that the link to open the image modal
    // doesn't have the image URL as one of the arguments to the function
    var photoList = {};

    class PhotoAlbum {
        static getAlbum(albumId) {
            let testAlbumButton = $("#test-album-button");
            testAlbumButton.prop("disabled", true);
            this.render("");

            if (typeof albumId === "undefined") {
                albumId = $.trim($("#test-album-id").val());
            }

            albumId = parseInt(albumId);
            if (isNaN(albumId)) {
                testAlbumButton.prop("disabled", false);
                PhotoAlbum.exception("Album ID must be an integer!");
                return;
            }

            let jqxhr = $.get( "/api/photo-album/" + albumId)
                .done((data) => {
                    if (typeof data.error !== "undefined") {
                        PhotoAlbum.exception(data.error);
                        return;
                    }

                    // no known formatted error, but expected data is not present
                    // put a generic 400 error, since something weird went wrong
                    if (typeof data.data !== "object") {
                        PhotoAlbum.exception("400 (Bad Request)");
                        return;
                    }

                    let album = data.data;
                    if (album.length === 0) {
                        PhotoAlbum.exception("No album found for the specified album ID");
                        return;
                    }

                    PhotoAlbum.render(
                        PhotoAlbum.htmlIze(album)
                    );
                });

            jqxhr.always(() => {
                $("#test-album-button").prop("disabled", false);

                if (jqxhr.status >= 400) {
                    PhotoAlbum.exception(
                        Ajax.getErrorFromJqxhr(jqxhr)
                    );
                }
            });
        }

        static htmlIze(album) {
            let output = "";
            output += '<div class="row mt-2">';
            photoList = {};
            for (let i in album) {
                let photo = album[i];
                photoList[photo.id] = photo;
                output += this.displayThumbnail(photo);
            }
            output += "</div>\n";
            return output;
        }

        // Since this is only being called by something internal to the script,
        // and anything internally even getting to this point has already been validated,
        // I'm going to assume that photo is valid.
        static displayThumbnail(photo) {
            let output = "";
            output += '<div class="col text-center">';
            output += "<figure>";
            output += "<a href=\"javascript:PhotoAlbum.launchPhotoInModal(" + photo['id'] + ");\"><img src=\"" + photo['thumbnailUrl'] + '" alt="' + photo['title'] + '" class="figure-img img-fluid shadow rounded" style="width: 150px; height: 150px; min-width: 150px;" /></a>';
            output += "<figcaption class=\"col\">" + this.photoDescription(photo['id'], photo['title']) + "</figcaption>";
            output += "</figure>";
            output += "</div>";

            return output;
        }

        static launchPhotoInModal(id) {
            let photo = photoList[id];
            $("#test-album-modal-label").html(
                this.photoDescription(id, photo['title'])
            );
            $("#test-album-modal-display").html(
                '<img src="' + photo['url'] + '" alt="' + this.photoDescription(id, photo['title']) + '" style="width: 600px; height: 600px; min-width: 600px;" />'
            );
            let photoAlbumModal = new bootstrap.Modal(document.getElementById('test-album-modal'), {
                keyboard: true
            });
            photoAlbumModal.show();
        }

        static photoDescription(id, title) {
            return "[" + id + "] " + title;
        }

        static render(output) {
            $("#test-album-output").html(
                FunWithText.cleanString(output)
            );
        }

        static exception(message) {
            this.render(
                "<p class=\"h4\">" + FunWithText.cleanString(message) + "</p>"
            );
        }
    }
</script>
