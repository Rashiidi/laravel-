namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    <p class="text-danger">
    You must <a href="{{ route('login', ['redirect' => url()->current()]) }}">log in</a> to register for this event.
</p>
}