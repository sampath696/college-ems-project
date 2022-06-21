<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple</title>
    <style>
    * {
        font-family: Lato;
        margin: 0;
        padding: 0;
        --transition: 0.15s;
        --border-radius: 0.5rem;
        --background: #ffc107;
        --box-shadow: #ffc107;
    }

    .cont-bg {
        min-height: 100vh;
        background-image: radial-gradient(circle farthest-corner at 7.2% 13.6%,
                rgba(37, 249, 245, 1) 0%,
                rgba(8, 70, 218, 1) 90%);
        padding: 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .cont-title {
        color: white;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .cont-main {
        display: flex;
        flex-wrap: wrap;
        align-content: center;
        justify-content: center;
    }

    .cont-checkbox {
        width: 150px;
        height: 100px;
        border-radius: var(--border-radius);
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        background: white;
        transition: transform var(--transition);
    }

    .cont-checkbox:first-of-type {
        margin-bottom: 0.75rem;
        margin-right: 0.75rem;
    }

    .cont-checkbox:active {
        transform: scale(0.9);
    }

    input {
        display: none;
    }

    input:checked+label {
        opacity: 1;
        box-shadow: 0 0 0 3px var(--background);
    }

    input:checked+label img {
        -webkit-filter: none;
        /* Safari 6.0 - 9.0 */
        filter: none;
    }

    input:checked+label .cover-checkbox {
        opacity: 1;
        transform: scale(1);
    }

    input:checked+label .cover-checkbox svg {
        stroke-dashoffset: 0;
    }

    label {
        display: inline-block;
        cursor: pointer;
        border-radius: var(--border-radius);
        overflow: hidden;
        width: 100%;
        height: 100%;
        position: relative;
        opacity: 0.6;
    }

    label img {
        width: 100%;
        height: 70%;
        object-fit: cover;
        clip-path: polygon(0% 0%, 100% 0, 100% 81%, 50% 100%, 0 81%);
        -webkit-filter: grayscale(100%);
        /* Safari 6.0 - 9.0 */
        filter: grayscale(100%);
    }

    label .cover-checkbox {
        position: absolute;
        right: 5px;
        top: 3px;
        z-index: 1;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: var(--box-shadow);
        border: 2px solid #fff;
        transition: transform var(--transition),
            opacity calc(var(--transition) * 1.2) linear;
        opacity: 0;
        transform: scale(0);
    }

    label .cover-checkbox svg {
        width: 13px;
        height: 11px;
        display: inline-block;
        vertical-align: top;
        fill: none;
        margin: 5px 0 0 3px;
        stroke: #fff;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-dasharray: 16px;
        transition: stroke-dashoffset 0.4s ease var(--transition);
        stroke-dashoffset: 16px;
    }

    label .info {
        text-align: center;
        margin-top: 0.2rem;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .container {
        position: relative;
        width: 100px;
        height: 100px;
        float: left;
        margin-left: 10px;
    }

    .checkbox {
        position: absolute;
        bottom: 0px;
        right: 0px;
    }
    </style>
</head>

<body>




    <div class="cont-bg">
        <div class="cont-title">Checkbox</div>
        <div class="cont-main">
            <div class="cont-checkbox">
                <input type="checkbox" id="myCheckbox-1" />
                <label for="myCheckbox-1">
                    <img src="images/h1.jpg" />
                    <span class="cover-checkbox">
                        <svg viewBox="0 0 12 10">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                    </span>
                    <div class="info">Mazda MX-5 Miata</div>
                </label>
            </div>
            <div class="cont-checkbox">
                <input type="checkbox" id="myCheckbox-2" />
                <label for="myCheckbox-2">
                    <img src="images/1.jpg" />
                    <span class="cover-checkbox">
                        <svg viewBox="0 0 12 10">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                    </span>
                    <div class="info">Toyota Supra</div>
                </label>
            </div>
        </div>
        <div class="cont-title">Radio</div>
        <div class="cont-main">
            <div class="cont-checkbox">
                <input type="radio" name="myRadio" id="myRadio-1" />
                <label for="myRadio-1">
                    <img src="images/h1.jpg" />
                    <span class="cover-checkbox">
                        <svg viewBox="0 0 12 10">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                    </span>
                    <div class="info">Mazda MX-5 Miata</div>
                </label>
            </div>
            <div class="cont-checkbox">
                <input type="radio" name="myRadio" id="myRadio-2" />
                <label for="myRadio-2">
                    <img src="images/1.jpg" />
                    <span class="cover-checkbox">
                        <svg viewBox="0 0 12 10">
                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                        </svg>
                    </span>
                    <div class="info">Toyota Supra</div>
                </label>
            </div>
        </div>
    </div>



</body>

</html>