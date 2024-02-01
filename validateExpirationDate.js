var timeoutId;

    function validateExpirationDate() {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(function() {
            var input = document.getElementById("venc");
            var value = input.value.replace(/\D/g, "");
            var formattedValue = "";
            for (var i = 0; i < value.length; i++) {
                if (i == 2) {
                    formattedValue += "/";
                }
                formattedValue += value[i];
            }
            input.value = formattedValue;

            var today = new Date();
            var someday = new Date();
            someday.setFullYear(20 + value.slice(2), value.slice(0, 2) - 1, 1);
            if (someday < today) {
                alert("La fecha de expiración es Incorrecta.");
                return;
            }
        }, 1000);
    }