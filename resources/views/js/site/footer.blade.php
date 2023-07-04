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
<script>
    /**
     * Some time stuff, borrowed from ClearHello
     */

    const daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    const time = function (date = new Date()) {
        return Math.floor(date.valueOf() / 1000);
    };
    time.daysInMonth = function (zeroIndexMonth, year) {
        if (zeroIndexMonth == 1 && year % 4 == 0) {
            return 29;
        } else {
            return daysInMonth[zeroIndexMonth];
        }
    };
    time.daysLastMonth = function (zeroIndexMonth, year) {
        if (!zeroIndexMonth) {
            zeroIndexMonth = 11;
            year--;
        } else {
            zeroIndexMonth--;
        }
        return time.daysInMonth(zeroIndexMonth, year);
    };
    time.dateString = function (date, timeZone = "America/Los_Angeles") {
        if (!(date instanceof Date)) {
            // @ts-ignore
            date = new Date(date ? date * 1000 : undefined);
        }
        return date.toLocaleDateString("en-US", { timeZone });
    };
    time.timeString = function (date, timeOnly = false, timeZone = "America/Los_Angeles") {
        if (!(date instanceof Date)) {
            // @ts-ignore
            date = new Date(date ? date * 1000 : undefined);
        }
        if (timeOnly) {
            return date.toLocaleTimeString("en-US", { timeZone });
        }
        return `${date.toLocaleDateString("en-US", {
            timeZone,
        })} ${date.toLocaleTimeString("en-US", { timeZone })}`;
    };
    time.durationString = function (durationSeconds, precision = 0) {
        let durations = [];
        for (const duration of [
            { label: "year", seconds: 365 * 24 * 60 * 60 },
            { label: "day", seconds: 24 * 60 * 60 },
            { label: "hour", seconds: 60 * 60 },
            { label: "minute", seconds: 60 },
            { label: "second", seconds: 1 },
        ]) {
            if (durationSeconds >= duration.seconds) {
                const val = Math.floor(durationSeconds / duration.seconds);
                durations.push(`${val} ${duration.label}${val > 1 ? "s" : ""}`);
                durationSeconds = durationSeconds % duration.seconds;
            }
        }
        if (precision) {
            durations = durations.slice(0, precision);
        }
        const last = durations.pop();
        if (durations.length) {
            return `${durations.join(", ")} and ${last}`;
        } else {
            return last || "0 seconds";
        }
    };
    time.durationPast = function (date, precision) {
        if (!(date instanceof Date)) {
            date = date ? new Date(date * 1000) : new Date();
        }
        return time.durationString(time() - Math.floor(date.valueOf() / 1000), precision);
    };
    time.anniversaryDate = function anniversaryDate(startDate = new Date(), billingPeriod = 1) {
        const anniversaryDate = new Date(startDate instanceof Date ? startDate.valueOf() : startDate * 1000);
        if (anniversaryDate.getDate() > 28) {
            anniversaryDate.setDate(1);
            billingPeriod++;
        }
        anniversaryDate.setMonth(anniversaryDate.getMonth() + billingPeriod);
        anniversaryDate.setHours(0);
        anniversaryDate.setMinutes(0);
        anniversaryDate.setSeconds(0);
        return Math.floor(anniversaryDate.valueOf() / 1000);
    };
    time.anniversaryDay = function anniversaryDay(day, date = new Date()) {
        if (typeof date === "number") {
            date = new Date(date * 1000);
        }
        date.setHours(0);
        date.setMinutes(0);
        date.setMilliseconds(0);
        date.setDate(day);
        if (date.valueOf() < Date.now()) {
            date.setMonth(date.getMonth() + 1);
        }
        return Math.floor(date.valueOf() / 1000);
    };
    time.wait = function (ms) {
        return new Promise((resolve) => setTimeout(() => resolve(), ms));
    };
    time.yyyymm = function (date) {
        if (!(date instanceof Date)) {
            date = date ? new Date(date * 1000) : new Date();
        }
        let month = date.getMonth() + 1;
        if (month < 10) {
            month = `0${month}`;
        }
        return `${date.getFullYear()}${month}`;
    };
    time.yyyymmdd = function (date) {
        if (!(date instanceof Date)) {
            date = date ? new Date(date * 1000) : new Date();
        }
        let month = date.getMonth() + 1;
        if (month < 10) {
            month = `0${month}`;
        }
        let day = date.getDate();
        if (day < 10) {
            day = `0${day}`;
        }
        return `${date.getFullYear()}-${month}-${day}`;
    };
    time.fromYYYYMM = function (yyyymm) {
        return new Date(`${yyyymm.substr(0, 4)}-${yyyymm.substr(4)}-01 00:00:00`);
    };
    time.humanYYYYMM = function (yyyymm) {
        const date = time.fromYYYYMM(yyyymm);
        return date.toLocaleString("en-us", { month: "long", year: "numeric" });
    };
    time.dateFloor = function (date) {
        let newDate = new Date();
        if (typeof date !== "undefined") {
            if (date instanceof Date) {
                newDate = new Date(date.valueOf());
            } else {
                newDate = new Date(date * 1000);
            }
        }
        newDate.setSeconds(0);
        newDate.setMinutes(0);
        newDate.setHours(0);
        return date instanceof Date ? newDate : time(newDate);
    };
</script>
