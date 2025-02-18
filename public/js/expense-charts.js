document.addEventListener("DOMContentLoaded", function () {

    /**
     * manage date pickers for start and end date
     */
    $('#start_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD'
        },
        startDate:  moment().startOf('month'),
    });



    $('#end_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD'
        },
        startDate:  moment().endOf('month'),
    });



    /**
     * generate charts and fetch data from the backend
     */

    const pieChartCanvas = document.getElementById("pieChart");
    let pieChart;

    function fetchExpenseData(startDate, endDate) {
        $('.message-alert').empty();

        if (pieChart) pieChart.destroy();

        $.ajax({
            url: "/api/expenses-by-category",
            type: "GET",
            data: { start_date: startDate, end_date: endDate },
            success: function (response) {
                if (response.data.length === 0) {
                    $('.message-alert').html(`<p class="mt-4 text-sm text-danger text-center">-No data available for the given date range-</p>`);
                } else {
                    updateChart(response.labels, response.data);
                }
            },
            error: function (xhr) {
                $('.message-alert').empty(); // Clear previous error messages

                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';

                    Object.keys(errors).forEach(function (key) {
                        errors[key].forEach(function (message) {
                            errorMessages += `<p class="mt-4 text-sm text-danger text-center">${message}</p>`;
                        });
                    });

                    $('.message-alert').html(errorMessages);
                } else if (xhr.status === 401) {
                    $('.message-alert').html(`<p class="mt-4 text-sm text-danger text-center">Unauthorized: Please log in again.</p>`);
                } else {
                    $('.message-alert').html(`<p class="mt-4 text-sm text-danger text-center">An error occurred. Please try again later.</p>`);
                    console.error("Error fetching expense data:", xhr.responseJSON);
                }
            }
        });
    }

    function updateChart(labels, data) {
        if (pieChart) pieChart.destroy();

        pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#4bc0c0', '#9966ff'],
                }]
            }
        });
    }

    $("#filterForm").on("submit", function (event) {
        event.preventDefault();
        const startDate = $("#start_date").val();
        const endDate = $("#end_date").val();
        fetchExpenseData(startDate, endDate);
    });

    fetchExpenseData(moment().startOf('month').format('YYYY-MM-DD'), moment().endOf('month').format('YYYY-MM-DD'));
});
