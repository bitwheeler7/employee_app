document.getElementById('country').addEventListener('change', function () {

            let countryId = this.value;

            let state = document.getElementById('state');

            let city = document.getElementById('city');

            state.innerHTML = '<option value="">Select State</option>';

            city.innerHTML = '<option value="">Select City</option>';


            if (countryId != '') {
                fetch('/employees/states/' + countryId)

                    .then(response => response.json())

                    .then(data => {

                        data.forEach(function (item) {

                            state.innerHTML +=
                                '<option value="' + item.id + '">' +
                                item.name +
                                '</option>';

                        });

                    });
            }

        });



        document.getElementById('state').addEventListener('change', function () {

            let stateId = this.value;

            let city = document.getElementById('city');

            city.innerHTML = '<option value="">Select City</option>';


            if (stateId != '') {
                fetch('/employees/cities/' + stateId)

                    .then(response => response.json())

                    .then(data => {

                        data.forEach(function (item) {

                            city.innerHTML +=
                                '<option value="' + item.id + '">' +
                                item.name +
                                '</option>';

                        });

                    });
            }

        });



        document.getElementById('joining_date')
            .addEventListener('change', function () {

                let joiningDate = new Date(this.value);

                let today = new Date();

                let years =
                    today.getFullYear() -
                    joiningDate.getFullYear();

                if (
                    today.getMonth() < joiningDate.getMonth() ||
                    (
                        today.getMonth() == joiningDate.getMonth() &&
                        today.getDate() < joiningDate.getDate()
                    )
                ) {
                    years--;
                }

                document.getElementById('years').value =
                    years + ' Year(s)';

            });
