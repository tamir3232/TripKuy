@extends('layouts.main')

@section('container')
    <style>
        @import url("https://fonts.googleapis.com/css?family=Lato&display=swap");

        * {
            box-sizing: border-box;
        }


        .movie-container {
            margin: 20px 0;
        }

        .movie-container select {
            background-color: #fff;
            border: 0;
            border-radius: 5px;
            font-size: 16px;
            margin-left: 10px;
            padding: 5px 15px 5px 15px;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
        }

        .container {
            perspective: 100px;
            margin-bottom: 30px;
            border-radius: 0px;
            background-color: white;
            border: solid black;
            width: 20%;
        }

        .seat {
            background-color: #444451;
            height: 40px;
            width: 50px;
            margin: 3px;
            font-size: 50px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin-right: 15px;
        }

        .seat.selected {
            background-color: green;

        }

        .seat.sold {
            background-color: #ff0000;
        }

        .seat.notExist {
            background-color: #999999;
            opacity: 20%;
        }

        .seat:nth-of-type(2) {
            margin-right: 18px;
        }

        .seat:nth-last-of-type(2) {
            margin-left: 18px;
        }

        .seat:not(.sold):hover {
            cursor: pointer;
            transform: scale(1.2);
        }

        .showcase .seat:not(.sold):hover {
            cursor: default;
            transform: scale(1);
        }

        /*
                .seat:not(.notExist):hover {
                    cursor: pointer;
                    transform: scale(1.2);
                }

                .showcase .seat:not(.notExist):hover {
                    cursor: default;
                    transform: scale(1);
                } */


        .showcase {
            background: rgba(0, 0, 0, 0.1);
            padding: 5px 10px;
            border-radius: 5px;
            color: #777;
            list-style-type: none;
            display: flex;
            justify-content: space-between;
        }

        .showcase li {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 10px;
        }

        .showcase li small {
            margin-left: 2px;
        }

        .row {
            display: flex;
            margin-top: 14px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        p.text {
            margin: 5px 0;
        }

        p.text span {
            color: rgb(158, 248, 158);
        }
    </style>



    <div class="container">
        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>

        </div>
        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>


        </div>
        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>

        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
        </div>
        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>

        </div>
        <div class="row">
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>
            <div class="seat"></div>

        </div>
    </div>

    <div style="justify-content: right; align-items: right;  display: flex; margin-right:15%">
        <div style="border:solid black; padding:20px; width:300px">
            <p class="text">
                Kursi Terpilih : <span id="count">0</span>
            </p>
            <p>TOTAL : </p>
            <p style="text-align: right"> <span id="total">0</p>
            <a id ="a1" href="form-pesanan?keberangkatan_id={{ $keberangkatan->id }} ">
                <button type="button" class="btn btn-primary"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                    CONFIRM
                </button>
            </a>
        </div>
    </div>

    <script>
        const seats = document.querySelectorAll('.seat');
        const count = document.getElementById('count');
        const total = document.getElementById('total');
        const kursis =
            {!! json_encode($kursis) !!}; // Mengambil data kursis dari PHP dan mengkonversinya menjadi objek JavaScript
        const firstSeat = kursis[0];
        let selectedSeats = 0;
        let totalPrice = 0;
        const selectedSeatIds = [];
        let a = document.getElementById('a1');
        seats.forEach((seat, index) => {
            seat.id = index + 1;

            function isSeatSold(seatId) {
                seatt = kursis[seatId - 1];
                // console.log(seatt)
                return seatt && seatt.penumpang_id !== null;

            }

            function exist(seatId) {
                seatExist = kursis[seatId - 1];
                return seatExist == null;
            }
            if (isSeatSold(seat.id)) {
                seat.classList.add('sold');
            }
            if (exist(seat.id)) {
                seat.classList.add('notExist');
            }


            seat.addEventListener('click', () => {
                if (isSeatSold(seat.id)) {
                    return;
                }
                if (exist(seat.id)) {
                    return;
                }
                if (seat.classList.contains('selected')) {
                    seat.classList.remove('selected');
                    selectedSeats--;
                    totalPrice -= {{ $keberangkatan->price }};

                    const seatIndex = selectedSeatIds.indexOf(seat.id);
                    if (seatIndex !== -1) {
                        selectedSeatIds.splice(seatIndex, 1);
                    }

                } else {
                    seat.classList.add('selected');
                    selectedSeats++;
                    totalPrice += {{ $keberangkatan->price }};

                    selectedSeatIds.push(seat.id);
                }

                count.textContent = selectedSeats;
                total.textContent = 'Rp ' + totalPrice;
            });
        });

        // // Mengirim data kursi yang dipilih ke server saat tombol "CONFIRM" diklik
        const confirmButton = document.querySelector('.btn-primary');
        confirmButton.addEventListener('click', () => {

            a.href = a.href + "&&seat=" + selectedSeatIds;


        });
    </script>
@endsection
