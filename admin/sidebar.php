<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        aside {
            position: fixed;
            width: fit-content;
            top: 50px;
            bottom: 0;
            left: 0;
            z-index: 1000;
            display: block;
            padding: 20px 0;
            background-color: #f5f5f5;
            border-right: 1px solid #eee;
        }

        i.fa-times,
        i.fa-bars {
            font-size: 24px;
        }

        button.toggle-btn {
            border: none;
            outline: none;
            display: none;
        }

        @media (max-width: 1000px) {
            aside {
                left: -100%;
                transition: left 0.5s ease;
            }

            aside.active {
                left: 0;
            }

            button.toggle-btn {
                display: inline;
            }

            button.open-btn {
                position: absolute;
                top: 72px;
                left: 10px; /* Adjust the left position as needed */
            }

            button.toggle-btn {
                position: relative;
                top: 10px; /* Adjust the top position as needed */
            }

            h1.section-title {
                position: relative;
                left: 40px; /* Adjust the left position as needed */
            }
        }
    </style>
</head>

<body>

    <button class="btn toggle-btn open-btn"><i class="fas fa-bars"></i></button>

    <aside class="bg-primary-subtle">
        <div class="row">
            <button class="btn toggle-btn close-btn w-fit"><i class="fas fa-times"></i></button>
        </div>

        <div class="list-group list-group-flush" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-primary active" id="list-dashboard-list" data-bs-toggle="list"
                href="#dashboard" role="tab" aria-controls="list-dashboard">Dashboard</a>
            <a class="list-group-item list-group-item-primary" id="list-electionStatus-list" data-bs-toggle="list"
                href="#electionStatus" role="tab" aria-controls="list-electionStatus">Election Status</a>
            <a class="list-group-item list-group-item-primary" id="list-CandDetail-list" data-bs-toggle="list"
                href="#CandDetail" role="tab" aria-controls="list-CandDetail">Candidate Details</a>
            <a class="list-group-item list-group-item-primary" id="list-applications-list" data-bs-toggle="list"
                href="#applications" role="tab" aria-controls="list-applications">Nominee Applications</a>
        </div>
    </aside>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector(".open-btn").addEventListener('click', function () {
                document.querySelector("aside").classList.add('active');
            });

            document.querySelector(".close-btn").addEventListener('click', function () {
                document.querySelector("aside").classList.remove('active');
            });
        });
    </script>

</body>

</html>