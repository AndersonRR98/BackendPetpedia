<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $status
 * @property string|null $comment
 * @property int|null $pet_id
 * @property int|null $shelter_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\pet|null $pet
 * @property-read \App\Models\requestt|null $requests
 * @property-read \App\Models\shelter|null $shelter
 * @method static \Database\Factories\AdoptionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption wherePetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption whereShelterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Adoption whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAdoption {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $type
 * @property string $url
 * @property string|null $upload_date
 * @property int|null $topic_id
 * @property int|null $answer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\answer|null $answer
 * @property-read \App\Models\topic|null $topic
 * @method static \Database\Factories\AverageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average whereAnswerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average whereUploadDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Average whereUrl($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperAverage {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $phone
 * @property string $address
 * @property string $biography
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ProfileFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Profile whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperProfile {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property int $role_id
 * @property int $is_active
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\forum> $forums
 * @property-read int|null $forums_count
 * @property-read mixed $image_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\notification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\payment> $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\pet> $pets
 * @property-read int|null $pets_count
 * @property-read \App\Models\Profile|null $profile
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\requestt> $requestts
 * @property-read int|null $requestts_count
 * @property-read \App\Models\role $role
 * @property-read \App\Models\shelter|null $shelter
 * @property-read \App\Models\shoppingcar|null $shoppingcarts
 * @property-read \App\Models\trainer|null $trainer
 * @property-read \App\Models\veterinary|null $veterinary
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $content
 * @property string $creation_date
 * @property int|null $topic_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Average> $averages
 * @property-read int|null $averages_count
 * @property-read \App\Models\topic|null $topic
 * @method static \Database\Factories\answerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|answer filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|answer getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|answer included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|answer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|answer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|answer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|answer sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|answer whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|answer whereCreationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|answer whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|answer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperanswer {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $date
 * @property string $description
 * @property string $status
 * @property int|null $trainer_id
 * @property int|null $veterinary_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\notification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\trainer|null $trainer
 * @property-read \App\Models\veterinary|null $veterinary
 * @method static \Database\Factories\appointmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment whereTrainerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|appointment whereVeterinaryId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperappointment {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\product> $products
 * @property-read int|null $products_count
 * @method static \Database\Factories\categoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|category filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|category getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|category included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|category sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelpercategory {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $creation_date
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\topic> $topics
 * @property-read int|null $topics_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\forumFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum whereCreationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|forum whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperforum {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $available_quantities
 * @property int|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\product|null $product
 * @method static \Database\Factories\inventoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|inventory filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|inventory getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|inventory included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|inventory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|inventory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|inventory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|inventory sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|inventory whereAvailableQuantities($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|inventory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|inventory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|inventory whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|inventory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperinventory {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int|null $user_id
 * @property int|null $appointment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\appointment|null $appointment
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\notificationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification whereAppointmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|notification whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelpernotification {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $status
 * @property string $total_amount
 * @property string $order_date
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\orderitem> $orderitems
 * @property-read int|null $orderitems_count
 * @property-read \App\Models\shipment|null $shipments
 * @method static \Database\Factories\orderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|order whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperorder {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $quantity
 * @property string $price
 * @property int|null $order_id
 * @property int|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\order|null $order
 * @property-read \App\Models\product|null $product
 * @method static \Database\Factories\orderitemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|orderitem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperorderitem {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $amount
 * @property string $date
 * @property string $status
 * @property int $user_id
 * @property string $payment_type
 * @property int $payment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $payment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\paymentmetho> $paymentmethos
 * @property-read int|null $paymentmethos_count
 * @method static \Database\Factories\paymentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|payment whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperpayment {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $type
 * @property string $description
 * @property string $date_issued
 * @property int $payment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\payment $payment
 * @method static \Database\Factories\paymentmethoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho whereDateIssued($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho wherePaymentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|paymentmetho whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperpaymentmetho {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $age
 * @property string $species
 * @property string|null $breed
 * @property string|null $size
 * @property string $sex
 * @property string $description
 * @property string|null $image
 * @property string|null $birth_date
 * @property int|null $shelter_id
 * @property int|null $user_id
 * @property int|null $veterinary_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $image_url
 * @property-read \App\Models\shelter|null $shelter
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\veterinary|null $veterinary
 * @method static \Database\Factories\petFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereBreed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereShelterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereSpecies($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|pet whereVeterinaryId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperpet {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property string|null $image
 * @property int|null $category_id
 * @property int|null $veterinary_id
 * @property int|null $shoppingcar_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\category|null $category
 * @property-read mixed $image_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\inventory> $inventories
 * @property-read int|null $inventories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\orderitem> $orderitems
 * @property-read int|null $orderitems_count
 * @property-read \App\Models\shoppingcar|null $shoppingcar
 * @property-read \App\Models\veterinary|null $veterinary
 * @method static \Database\Factories\productFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereShoppingcarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|product whereVeterinaryId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperproduct {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $priority
 * @property string $application_status
 * @property int|null $adoption_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Adoption|null $adoption
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\requesttFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt whereAdoptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt whereApplicationStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|requestt whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperrequestt {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\roleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|role filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|role getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|role included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|role query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|role sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperrole {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $description
 * @property string $duration
 * @property int|null $trainer_id
 * @property int|null $requestt_id
 * @property int|null $veterinary_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\requestt|null $requestt
 * @property-read \App\Models\trainer|null $trainer
 * @property-read \App\Models\veterinary|null $veterinary
 * @method static \Database\Factories\serviceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service whereRequesttId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service whereTrainerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|service whereVeterinaryId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperservice {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $shelter_name
 * @property string $responsible_person
 * @property int $capacity
 * @property string $rating
 * @property int $review_count
 * @property string|null $image
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Adoption> $adoptions
 * @property-read int|null $adoptions_count
 * @property-read \App\Models\pet|null $pets
 * @property-read \App\Models\User|null $users
 * @method static \Database\Factories\shelterFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter whereResponsiblePerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter whereReviewCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter whereShelterName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shelter whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelpershelter {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $address
 * @property string $cost
 * @property string $shipping_method
 * @property string $status
 * @property int $order_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\order $order
 * @method static \Database\Factories\shipmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment whereShippingMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shipment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelpershipment {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $amount
 * @property string $date
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\shoppingcarFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shoppingcar filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shoppingcar getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shoppingcar included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shoppingcar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shoppingcar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shoppingcar query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shoppingcar sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shoppingcar whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shoppingcar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shoppingcar whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shoppingcar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shoppingcar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|shoppingcar whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelpershoppingcar {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $creation_date
 * @property int|null $forum_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\forum|null $forum
 * @method static \Database\Factories\topicFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic whereCreationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic whereForumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|topic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelpertopic {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $specialty
 * @property int $experience_years
 * @property string|null $qualifications
 * @property string $hourly_rate
 * @property string $rating
 * @property int $review_count
 * @property string|null $image
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\appointment> $appointments
 * @property-read int|null $appointments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\payment> $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\pet> $pets
 * @property-read int|null $pets_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\service> $services
 * @property-read int|null $services_count
 * @property-read \App\Models\User|null $users
 * @method static \Database\Factories\trainerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer whereExperienceYears($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer whereHourlyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer whereQualifications($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer whereReviewCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer whereSpecialty($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|trainer whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelpertrainer {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $clinic_name
 * @property string|null $image
 * @property string $specialization
 * @property string $veterinary_license
 * @property string|null $schedules
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\appointment> $appointments
 * @property-read int|null $appointments_count
 * @property-read mixed $image_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\payment> $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\pet> $pets
 * @property-read int|null $pets_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\service> $services
 * @property-read int|null $services_count
 * @property-read \App\Models\User|null $users
 * @method static \Database\Factories\veterinaryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary filter()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary getOrPaginate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary included()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary sort()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary whereClinicName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary whereSchedules($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary whereSpecialization($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|veterinary whereVeterinaryLicense($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperveterinary {}
}

