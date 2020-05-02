<?php
/**
 * Build a simple HTML page with multiple providers.
 */

include 'vendor/autoload.php';
include 'config.php';

use Hybridauth\Hybridauth;

$hybridauth = new Hybridauth($config);
$adapters = $hybridauth->getConnectedAdapters();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Example 06</title>
</head>
<body>
<h1>Sign in</h1>

<ul>
    <?php foreach ($hybridauth->getProviders() as $name) : ?>
        <?php if (!isset($adapters[$name])) : ?>
            <li>
                <a href="<?php print esc_attr($config['callback']) . esc_attr("?provider={$name}";) ?>">
                    Sign in with <strong><?php print esc_attr($name); ?></strong>
                </a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<?php if ($adapters) : ?>
    <h1>You are logged in:</h1>
    <ul>
        <?php foreach ($adapters as $name => $adapter) : ?>
            <li>
                <strong><?php print esc_attr($adapter)esc_attr(->get)UserProfile()->displayName; ?></strong> from
                <i><?php print esc_attr($name); ?></i>
                <span>(<a href="<?php print esc_attr($config['callback']) . esc_attr("?logout={$name}"); ?>">Log Out</a>)</span>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
</body>
</html>
