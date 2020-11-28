<?php
$error = '';
$result = 0;

if (isset($_POST['submit'])) {
    if (is_numeric($_POST['var1']) && is_numeric($_POST['var2'])) {
        switch ($_POST['operation']) {
            case 'add':
                $result = (int)$_POST['var1'] + (int)$_POST['var2'];
                break;

            case 'div':
                if ((int)$_POST['var2']) {
                    $result = (int)$_POST['var1'] / (int)$_POST['var2'];
                } else {
                    $error = 'Деление на 0 запрещено';
                }
                break;

            case 'mult':
                $result = (int)$_POST['var1'] * (int)$_POST['var2'];
                break;

            case 'sub':
                $result = (int)$_POST['var1'] - (int)$_POST['var2'];
                break;
            default:
                $error = 'Операция не идентифицирована';
                break;
        }
    } else {
        $error = 'Оба параметра должны быть числами';
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Калькулятор</title>
    </head>
    <body>
        <h1>Программа калькулятор</h1>
        <div class="error" style="color: red">
            <?= $error ?>
        </div>
        <form class="" method="post" style="font-size: 14pt">
            <fieldset>
                <legend>Ввод параметров</legend>
                <label for="var1">Параметр X:
                <input type="text" name="var1" value="<?= strip_tags($_POST['var1'] ?? '') ?>" size="3">
                </label>
                <label for="var2">Параметр Y:
                    <input type="text" name="var2" value="<?= strip_tags($_POST['var2'] ?? '') ?>" size="3">
                </label>
                <label for="result">Результат
                    <input type="text" style="font-size: 16pt" name="result" value="<?= $result ?>" size="10" disabled>
                </label>
            </fieldset>
            <fieldset>
                <legend>Выбор операции</legend>
                <label for="operation">Операция</label>
                <select class="" name="operation">
                    <option value="add" <?= $_POST['operation'] === 'add' ? 'selected' : '' ?>>Сложение</option>
                    <option value="sub" <?= $_POST['operation'] === 'sub' ? 'selected' : '' ?>>Вычитание</option>
                    <option value="mult" <?= $_POST['operation'] === 'mult' ? 'selected' : '' ?>>Умножение</option>
                    <option value="div" <?= $_POST['operation'] === 'div' ? 'selected' : '' ?>>Деление</option>
                </select>
                <input type="submit" name="submit" value="Получить результат">
            </fieldset>
        </form>
    </body>
</html>
