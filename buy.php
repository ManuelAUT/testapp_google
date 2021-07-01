require 'vendor/autoload.php';

use Google\Cloud\PubSub\PubSubClient;

$pubSub = new PubSubClient();

// Get an instance of a previously created topic.
$topic = $pubSub->topic('terraform-topic');

// Publish a message to the topic.
$topic->publish([
    'data' => 'My new message.',
    'attributes' => [
        'location' => 'Detroit'
    ]
]);

// Get an instance of a previously created subscription.
$subscription = $pubSub->subscription('terraform-sub');

// Pull all available messages.
$messages = $subscription->pull();

foreach ($messages as $message) {
    echo $message->data() . "\n";
    echo $message->attribute('location');
}