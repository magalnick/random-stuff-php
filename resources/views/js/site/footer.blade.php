<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script>
    class FunWithText {
        static cleanString(string) {
            if (typeof string !== "string") {
                return "";
            }

            return $.trim(string);
        }
    }

    class Ajax {
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
    }
</script>
