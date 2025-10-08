@extends('layouts.front')

@push('style')
    <style>
        :root{
            --size:1;
        }
        .slots {
            overflow : initial;
            width: calc(var(--size) * 340px);
            margin: auto;
            height:  calc(var(--size) * 140px);
            display: flex;
            justify-content: space-around;
        }

        .slots span {
            color: #011953;
            cursor: default;
            background: #fff;
            border-radius: 5px;
            border: 3px solid #333;
            box-shadow: 0px 0px 10px #000;
            float: left;
            font-size:  calc(var(--size) * 64px);
            font-weight: bold;
            height:  calc(var(--size) * 100px);
            line-height:  calc(var(--size) * 100px);
            margin-left:  calc(var(--size) * 5px);
            width:  calc(var(--size) * 100px);
            -webkit-transition: all 8s ease;
            transition: all 8s ease;
        }

        .slots span.spin {
            transform: rotateX(7200deg);
        }

        .slots span:first-child {
            margin-left: 0;
        }

        a {
            background: #5cb85c;
            border-radius: 5px;
            border: 1px solid #4cae4c;
            box-shadow: 0px 0px 10px #111;
            color: #fff;
            display: inline-block;
            /*font-weight: bold;*/
            line-height: calc(var(--size) * 40px);
            text-align: center;
            text-decoration: none;
            text-shadow: 0px 1px 2px #333;
            /*width: 100px;*/
            padding: 1px calc(var(--size) * 20px);
            font-size: calc(var(--size) * 14px);
        }

        a:hover {
            box-shadow: 0px 0px 20px #111;
            background-color: #47a447;
            border-color: #398439;
            color: #eee;
        }
        #saveMember{
            padding: 0 !important;
            background-color: inherit;
        }
    </style>
@endpush

@section('content')
    <div class="d-flex justify-content-around text-center form-div">

        @if(count($newMembers) !=0)
            <div class="px-5">

                <h1></h1>
                <div class="slots" id="slots" style="direction: ltr">
                    <span>X</span>
                    <span>X</span>
                    <span>X</span>
                    <span>X</span>
                    <span>X</span>
                    <span>X</span>
                </div>
                <div style="width: 340px;
    height: 150px;
    background-color: #fff;
    color: #011953;
    font-size: 25px;
    text-align: center;
    margin: 0 auto;
    line-height: 1.5;
    border-radius: 11px;
    border: 5px solid #011953;
    vertical-align: middle;
    padding-left: 20px;
    padding-right: 20px;
    display: table-cell;" id="memberName">

                </div>
                <br>

                <div style="display: flex;justify-content: space-around;margin: 0 auto;direction: ltr;width: calc(var(--size) * 300px);">
                    <div class="button"><a href="#" id="hitMe"  style="background-color: #011953;border-color: #011953;">Choose a winner</a></div>
                    <form action="{{route('store-winner')}}" method="post" style="display:none;" id="saveMember">
                        @csrf
                        <input type="hidden" id="member_id" name="member_id">
                        <button type="submit" class="btn btn-info" style="background-color: #011953;border-color: #011953;color: #fff;border-radius: 10px;font-size: calc(var(--size) * 14px);padding: 1px calc(var(--size) * 20px);line-height: calc(var(--size) * 40px)">Confirm</button>
                    </form>
                </div>
            </div>

        @else
            <div>
                <p style="height: 130px;"></p>

                <p class="text-center" style="background-color: #fff;color: #011953;width: fit-content;margin: auto;padding: 10px 43px;border-radius: 5px;font-size: 18px;font-weight: bold;">
                    Awards have ended, thank you for attending
                </p>
                <p style="height: 130px;"></p>
            </div>
        @endif
    </div>
@endsection

@push('script')
    <script>

        (function () {
            var getRandomInt,
                hitMe,
                slots;



            {{--var members = [{{implode(',',$members)}}];--}}

            var members = [@foreach($newMembers as $newMember)
            [{!! $newMember['id'] .' , "'.$newMember['ar'].'"'.' , "'.$newMember['name'].'"'  !!}],
                @endforeach]
            getRandomInt = function (min,max) {
                return members[Math.floor(Math.random() * members.length)];
                return Math.floor(Math.random() * (max - min + 1)) + min;
            };

            //----------------------------------------------------------
            // Do not touch the code below
            //----------------------------------------------------------
            slots = document.querySelectorAll('#slots span');
            hitMe = document.querySelector('#hitMe');
            hitMe.counter = 0;

            // On button click (Enter as well)
            hitMe.addEventListener('click', function (e) {
                $('#memberName').text('')
                $('#slots span').text('X')
                // Get lucky numbers, range 0-9
                var nums = getRandomInt(0,300)
                var num = nums[1]
                var number = ('٠٠٠٠٠٠' + num).substr(-6)
                $('#member_id').val(nums[0])
                var name = nums[2];
                var employee_id = nums[3];
                setTimeout(function(){
                    $('#memberName').html(name).slideDown()
                },8000);
                // $('#memberName').delay(8000).text().slideDown()
                console.log(nums[2])
                var nums = number.split('');

                e.preventDefault();

                // Spin each slot
                [].forEach.call(slots, function (elm, inx, arr) {
                    setTimeout(function () {
                        // Trigger CSS transform
                        elm.classList.toggle('spin');

                        // If we have 3 lucky numbers
                        if (Array.isArray(nums) && nums.length === 6) {
                            // Inject the number, delay for effect
                            setTimeout(function () {
                                var tries,
                                    winner;

                                elm.innerHTML = nums[inx];
                            }, 7000);
                        }
                    }, inx * 60);

                    $('#hitMe').delay(8000).text('Choose a new winner')
                    $('#saveMember').delay(8000).fadeIn()
                });
            });
        }());

    </script>
@endpush
