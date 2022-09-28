<?php
require("./app.php");

$server_name = "localhost";
$user = "";
$pass = "";
$dbname = "";

$connect  = new mysqli($server_name, $user, $pass, $dbname);

$bot_Everything = new telegramBot();

if ($text == "/start") {

  $menu_btn = json_encode([

    "resize_keyboard" => true,
    // "one_time_keyboard"=>true ,
    "keyboard" => [
      [
        ["text" => "💻كل ما يخص البرمجة"],
        ["text" => "🔰تعلم اللغة الإنجليزية"]
      ],
      [
        ["text" => "🆓دورات مجانية"],
        ["text" => "📱تطبيقات ومواقع مفيدة"]
      ],
      [
        ["text" => "📚كتب متنوعة"]
      ]
    ]
  ]);

  $bot_Everything->SendMessage(
    $chate_id,
    " <b> $first_name </b> مرحبا  
              يمكنك الأن البدأ في استخدام البوت 
              حدد نوع المواضيع التي تريد
              ",
    $menu_btn
  );
} elseif ($text == "Go back 🔙") {

  $menu_btn = json_encode([

    "resize_keyboard" => true,
    // "one_time_keyboard"=>true ,
    "keyboard" => [
      [
        ["text" => "💻كل ما يخص البرمجة"],
        ["text" => "🔰تعلم اللغة الإنجليزية"]
      ],
      [
        ["text" => "🆓دورات مجانية"],
        ["text" => "📱تطبيقات ومواقع مفيدة"]
      ],
      [
        ["text" => "📚كتب متنوعة"]
      ]
    ]
  ]);


  $bot_Everything->SendMessage(
    $chate_id,
    " <b> العودةالى القائمة الرئيسية </b>",
    $menu_btn
  );
} elseif ($text == "📚كتب متنوعة") {
  $menu_btn = json_encode([

    "resize_keyboard" => true,
    // "one_time_keyboard"=>true ,
    "keyboard" => [
      [
        ["text" => " 🖥|كتب البرمجة والتقنية|"]
      ],
      [
        ["text" => "Go back 🔙"]
      ]
    ]
  ]);


  $bot_Everything->SendMessage(
    $chate_id,
    " <b> اختر نوع الكتب التي تريد</b>",
    $menu_btn
  );
} elseif ($text == "🔰تعلم اللغة الإنجليزية") {

  $menu_btn = json_encode([

    "resize_keyboard" => true,
    // "one_time_keyboard"=>true ,
    "keyboard" => [
      [
        ["text" => "|مواقع وتطبيقات لتعلم الانجليزية|"]
      ],
      [
        ["text" => "Go back 🔙"]
      ]
    ]
  ]);

  $bot_Everything->SendMessage(
    $chate_id,
    $text6_1,
    $menu_btn
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text6_2,
    $menu_btn
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text_6_3,
    $menu_btn
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text_6_4,
    $menu_btn
  );
} elseif ($text == "|مواقع وتطبيقات لتعلم الانجليزية|") {

  $bot_Everything->SendMessage(
    $chate_id,
    $text_7_1
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text_7_2
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text_7_3
  );
} elseif ($text == "📱تطبيقات ومواقع مفيدة") {

  $bot_Everything->SendMessage(
    $chate_id,
    $web1
  );
} elseif ($text == "🖥|كتب البرمجة والتقنية|") {
  $menu_btn = json_encode([

    "resize_keyboard" => true,
    // "one_time_keyboard"=>true ,
    "keyboard" => [
      [
        ["text" => "JAVASCRIPT|📌"],
        ["text" => "HTML&CSS|📌"]
      ],
      [
        ["text" => "PHP|📌"],
        ["text" => "JAVA|📌"]
      ],
      [

        ["text" => "REACT NATIVE|📌"],
        ["text" => "BOOTSTRAP|📌"]
      ],
      [
        ["text" => "C++ & C# & C|📌"],
        ["text" => "PYTHON|📌"]
      ],
      [
        ["text" => "JQUERY|📌"],
        ["text" => "VUE.JS|📌"]
      ],
      [
        ["text" => "REACT|📌"],
        ["text" => "NODE.JS|📌"]
      ],
      [
        ["text" => "📲|تطوير تطبيقات الأندرويد|"],
        ["text" => "🛡|أمن المعلومات|"]
      ],
      [
        ["text" => "⌨️|اختصارات كيبورد|"],
        ["text" => "⚙️|فوتوشوب|"],
        ["text" => "📁|قواعد البيانات|"]
      ],
      [
        ["text" => "📒|كتب اخرى|"],
        ["text" => "Go back 🔙"]
      ]
    ]
  ]);


  $bot_Everything->SendMessage(
    $chate_id,
    " <b> اختر نوع الكتب التي تريد</b>

      🔻ملاحظة :  بالنسبة لكتب البرمجة  تتوفر كتب بالعربية وبالانجليزية ولغات اخرى
      ",
    $menu_btn
  );
} elseif ($text == "JAVASCRIPT|📌") {
  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='javascript'  ";
  
  //GET FILE ID FROM Database

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "HTML&CSS|📌") {
  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='html' OR `file_name`='css'  ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "PHP|📌") {
  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='php'  ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "PYTHON|📌") {
  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='python'  ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "C++ & C# & C|📌") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='c' OR `file_name`='c++'  OR `file_name`='c#' ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "REACT NATIVE|📌") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='reactnative' ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "BOOTSTRAP|📌") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='bootstrap'  ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "JQUERY|📌") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='jquery'  ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "VUE.JS|📌") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='vuejs'  ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "JAVA|📌") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='java'  ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "REACT|📌") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='react'  ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "NODE.JS|📌") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='nodejs'  ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "📲|تطوير تطبيقات الأندرويد|") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='android' OR `file_name`='dart'   ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "🛡|أمن المعلومات|") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='secruit'  ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "⌨️|اختصارات كيبورد|") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='keyboard'  ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "⚙️|فوتوشوب|") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='adobe'  ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "📁|قواعد البيانات|") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='data'  OR `file_name`='sql' OR `file_name`='mongodb' OR `file_name`='mysql'   ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "📒|كتب اخرى|") {

  $sql_command = "SELECT * FROM `books_t` WHERE `file_name`='more'  ";

  $action = mysqli_query($connect, $sql_command);

  while ($line = mysqli_fetch_assoc($action)) {

    $bot_Everything->SendDocument(
      $chate_id,
      $line["file_id"],
      $line["thump_id"]
    );
  }
} elseif ($text == "💻كل ما يخص البرمجة") {

  $menu_btn = json_encode([

    "resize_keyboard" => true,
    // "one_time_keyboard"=>true ,
    "keyboard" => [
      [
        ["text" => "الدليل الشامل لتعلم البرمجة"],
        ["text" => "مسار مطور الويب بإستخدام React JS"]

      ],
      [
        ["text" => "مسار مطور الويب بإستخدام Vue JS"],
        ["text" => "مسار مطور الويب بإستخدام Angular"]
      ],
      [
        ["text" => "قنوات وتطبيقات لتعلم البرمجة"],
        ["text" => "Go back 🔙"]
      ]
    ]
  ]);


  $bot_Everything->SendMessage(
    $chate_id,
    "اختر الموضوع الدي تريد",
    $menu_btn
  );
} elseif ($text == "الدليل الشامل لتعلم البرمجة") {

  $bot_Everything->SendMessage(
    $chate_id,
    $text1
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text1_2,
    $menu_btn
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text1_3
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text1_4
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text1_5
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text1_6
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text1_7
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text1_8
  );
} elseif ($text == "مسار مطور الويب بإستخدام Angular") {

  $bot_Everything->SendMessage(
    $chate_id,
    $text2_1
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text2_2
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text2_3
  );
} elseif ($text == "مسار مطور الويب بإستخدام Vue JS") {

  $bot_Everything->SendMessage(
    $chate_id,
    $text3_1
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text3_2
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text3_3
  );
} elseif ($text == "مسار مطور الويب بإستخدام React JS") {

  $bot_Everything->SendMessage(
    $chate_id,
    $text4_1
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text4_2
  );

  $bot_Everything->SendMessage(
    $chate_id,
    $text4_3
  );
} elseif ($text == "قنوات وتطبيقات لتعلم البرمجة") {

  $bot_Everything->SendMessage(
    $chate_id,
    $text5_1
  );
} elseif ($text == "🆓دورات مجانية") {

  $bot_Everything->SendMessage(
    $chate_id,
    "هدا القسم غير متوفر حاليا سوف تتم اضافته قريبا"
  );
} else {
  $bot_Everything->SendMessage(
    $chate_id,
    ""
  );
}
