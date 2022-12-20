<script>
    class Markdown {
        static convertToHtml() {
            let convertToHtml = $("#convert-to-html");
            convertToHtml.prop("disabled", true);
            this.renderAll("");
            let markdown = $.trim(
                $("#markdown-source").val()
            );
            if (markdown === "") {
                convertToHtml.prop("disabled", false);
                return;
            }

            let jqxhr = $.post( "/api/convert-to-html", { "markdown": markdown })
                .done(function(data) {
                    if (typeof data.error !== "undefined") {
                        Markdown.exception(data.error);
                        return;
                    }

                    // no known formatted error, but expected data is not present
                    // put a generic 400 error, since something weird went wrong
                    if (typeof data.data.converted_html === "undefined") {
                        Markdown.exception("400 (Bad Request)");
                        return;
                    }

                    Markdown.renderAll(data.data.converted_html);
                });

            jqxhr.always(function() {
                $("#convert-to-html").prop("disabled", false);

                if (jqxhr.status >= 400) {
                    Markdown.exception(
                        Markdown.getErrorFromJqxhr(jqxhr)
                    );
                }
            });
        }

        static getErrorFromJqxhr(jqxhr) {
            if (
                typeof jqxhr.responseJSON.error === "string"
                && typeof jqxhr.responseJSON.status === "string"
                && jqxhr.responseJSON.status === "error"
            ) {
                return jqxhr.responseJSON.error;
            }

            return jqxhr.status + " (" + jqxhr.statusText + ")";
        }

        static loadSampleMarkdown() {
            $("#markdown-source").val(
                $("#sample-markdown").val()
            );
        }

        static renderConvertedTextarea(html) {
            if (typeof html !== "string") {
                html = "";
            }
            html = $.trim(html);
            $("#converted-to-html").val(
                FunWithText.cleanString(html)
            );
        }

        static renderHtml(html) {
            $("#rendered-html").html(
                FunWithText.cleanString(html)
            );
        }

        static renderAll(html) {
            this.renderConvertedTextarea(
                FunWithText.cleanString(html)
            );
            this.renderHtml(
                FunWithText.cleanString(html)
            );
        }

        static exception(message) {
            this.renderConvertedTextarea(
                FunWithText.cleanString(message)
            );
            this.renderHtml("");
        }
    }

    class FunWithText {
        static cleanString(string) {
            if (typeof string !== "string") {
                return "";
            }

            return $.trim(string);
        }
    }
</script>
