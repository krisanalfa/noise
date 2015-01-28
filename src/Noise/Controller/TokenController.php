<?php namespace Noise\Controller;

use KrisanAlfa\Kraken\Controller\NormController;
use Slim\Exception\Stop;
use Exception;
use SecretHelper;

class TokenController extends NormController
{
    public function create()
    {
        $entry = $this->collection->newInstance()->set($this->getCriteria());

        if ($this->request->isPost()) {
            try {
                $entry->set($this->request->post());
                $entry->set('secret_key', SecretHelper::generateSecretKey());
                $entry->set('shared_key', SecretHelper::generateSharedKey($entry->get('secret_key')));
                $entry->save();

                h('notification.info', $this->clazz.' created.');

                h('controller.create.success', array(
                    'model' => $entry
                ));
            } catch (Stop $e) {
                throw $e;
            } catch (Exception $e) {
                h('notification.error', $e);

                h('controller.create.error', array(
                    'model' => $entry,
                    'error' => $e,
                ));
            }
        }

        $this->data['entry'] = $entry;
    }
}
