<script>
    // you can write to stdout for debugging purposes, e.g.
    // console.log('this is a debug message');

    function solutionSubstrings(name, surname, age) {
        if (
            typeof name !== 'string'
            ||
            typeof surname !== 'string'
            ||
            typeof age !== 'number'
        ) {
            return 'Invalid input';
        }

        return name.substring(0, 2) + surname.substring(0, 2) + age.toString();
    }

    function solutionAandB(A, B) {
        // begin extra credit of checking where the number spread will no longer work
        if (
            (A + 1) * 2 < B
            ||
            (B + 1) * 2 < A
        ) {
            return 'Too wide of a spread between the 2 numbers, make them closer together.';
        }
        // end extra credit of checking where the number spread will no longer work

        let usingA = A >= B;
        let o = '';
        let iteration = 0;
        while (A > 0 || B > 0) {
            let iterationOffset = 1;
            if (
                (usingA && B - A >= 2)
                ||
                (!usingA && A - B >= 2)
            ) {
                iterationOffset = 0;
            }
            if (iteration > iterationOffset) {
                usingA = !usingA;
                iteration = 0;
            }

            if (usingA && A < 1) {
                usingA = false;
            }
            if (!usingA && B < 1) {
                usingA = true;
            }

            if (usingA) {
                o += 'a';
                A--;
                iteration++;
            } else {
                o += 'b';
                B--;
                iteration++;
            }
        }

        return o;
    }
</script>

<script>
    const Init = () => {
        $("#test-substr-button")
            .off("click")
            .on("click", () => {
                let name = $.trim($("#test-substr-name").val());
                let surname = $.trim($("#test-substr-surname").val());
                let age = parseInt($("#test-substr-age").val());

                $("#test-substr-output").html(
                    solutionSubstrings(name, surname, age)
                );
            });

        $("#test-a-b-button")
            .off("click")
            .on("click", () => {
                let a = parseInt($("#test-a-b-a").val());
                let b = parseInt($("#test-a-b-b").val());

                $("#test-a-b-output").html(
                    solutionAandB(a, b)
                );
            });
    };

    $(document).ready(function() {
        Init();
    });

</script>
