<?php
global $conn;
session_start();
include('../../../../../config/DbConfig.php');

const AMOUNT_IS_REQUIRED = "فیلد مقدار شارژ ضروری است.";
const POLICY_IS_REQUIRED = "قوانین و مفررات زا باید تایید کنید.";

if(isset($_POST['save_student_btn']))
{
    store($conn);
}

/**
 * @return void
 */
function store($conn)
{

    $amount = $_POST['amount'];
    $policy = $_POST['policy']?? false;
    validate($amount, $policy);

    $queryRun = $conn->prepare(
        "INSERT INTO wallets (amount, policy) VALUES (:amount, :policy)"
    );

    $queryRun->execute([
        ':amount' => $amount,
        ':policy' => $policy == "on" ? true : false
    ])
        ? $_SESSION['message'] = "اطلاعات با موفقیت ثبت شد."
        : $_SESSION['message'] = "خطایی در ثبت اطلاعات وحوپ دارد";

    echo "<script type='text/javascript'>window.top.location='../../../../../index.php';</script>";
    exit;
}

function validate($amount, $policy)
{
    if (!$amount)
    {
        $_SESSION['errors']['amount'] = AMOUNT_IS_REQUIRED;;
    }

    if ($policy != "on")
    {
        $_SESSION['errors']['policy'] = POLICY_IS_REQUIRED;
    }

    echo "<script type='text/javascript'>window.top.location='../../../../../index.php';</script>";
    exit;
}
