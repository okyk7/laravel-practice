<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormPost;
use App\Services\Form\FormService;

/**
 *
 * @author okyk7
 *
 */
class Form extends Controller
{
    /**
     * トップ
     * @param Request $req
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function top(Request $req)
    {
        // 戻った場合
        if ($req->has('back')) {
            $this->flashOldInputToFlash($req);
        }
        return view('Form.top');
    }

    /**
     * 確認
     * @param FormPost $req
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function confirm(FormPost $req)
    {
        /*
         * controllerでやる場合
        $this->validate($req, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ));
        */

        // complete用
        $req->flash();
        return view('Form.confirm')->with($req->input());
    }

    /**
     * 完了処理
     * @param Request $req
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function complete(Request $req)
    {
        // 戻るボタン時
        if ($req->input('submit') === 'back') {
            $this->flashOldInputToFlash($req);
            return redirect('/form?back=1');
        }

        $service = new FormService();
        $service->aa();
    }

    /**
     * oldInputを再度Flashする
     * @param Request $req
     */
    protected function flashOldInputToFlash(Request $req)
    {
        $req->session()->flashInput($req->session()->getOldInput());
    }
}
