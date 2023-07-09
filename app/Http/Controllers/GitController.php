<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PSpell\Config;

class GitController extends Controller
{
    public function pull(Request $request)
    {
        // Set Variables
        $LOCAL_ROOT         = "/home/graccpkq";
        $LOCAL_REPO_NAME    = "grace";
        $LOCAL_REPO         = "{$LOCAL_ROOT}/{$LOCAL_REPO_NAME}";
        $USERNAME           = "asish";
        $REPO_NAME          = "grace";
        $BRANCH             = "master";
        $REMOTE_REPO        = "git@github.com:{$USERNAME}/{$REPO_NAME}.git";
        shell_exec("cd {$LOCAL_REPO} && git pull origin {$BRANCH}");
        
        if ($_SERVER['HTTP_X_GITHUB_EVENT'] == 'push') {
            // Only respond to push webhooks from Github
            // compare the secret set in github and the one we set
            Log::info("webhook received push event");
            Log::info($request->header('X-Hub-Signature'), ['context' => $request->getContent()]);
            Log::info('sha1=' . hash_hmac('sha1', $request->getContent(), config('app.github_webhook_secret')), ['context' => 'webhook']);
            if ($request->header('X-Hub-Signature') == 'sha1=' . hash_hmac('sha1', $request->getContent(), config('app.github_webhook_secret'))) {

                if (file_exists($LOCAL_REPO)) {

                    // If there is already a repo, just run a git pull to grab the latest changes
                    shell_exec("cd {$LOCAL_REPO} && git pull origin {$BRANCH}");

                    die("done " . now()->timestamp);
                }
            }
        }
    }
}
