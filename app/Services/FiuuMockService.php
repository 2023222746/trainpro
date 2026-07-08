<?php

namespace App\Services;

use Illuminate\Http\Request;

class FiuuMockService
{
    /**
     * Generate a mock payment URL for the given order.
     *
     * @param array $orderData
     * @return string
     */
    public function generatePaymentUrl(array $orderData): string
    {
        // In a real integration, you would build the Fiuu payment parameters
        // and redirect to Fiuu's payment page.
        // For mock, we return a fake redirect URL with a token.
        $token = base64_encode(json_encode($orderData));
        return route('participant.payment.mock', ['token' => $token]);
    }

    /**
     * Handle the callback from Fiuu (return URL).
     *
     * @param Request $request
     * @return array
     */
    public function handleCallback(Request $request): array
    {
        // In mock mode, we simply trust the incoming parameters.
        // Real integration should verify signature and validate amount.
        $status = $request->input('status', 'success');
        $orderId = $request->input('order_id');
        $amount = $request->input('amount');

        return [
            'success' => ($status === 'success'),
            'order_id' => $orderId,
            'amount' => $amount,
            'message' => $status === 'success' ? 'Payment confirmed' : 'Payment failed',
        ];
    }

    /**
     * Handle the backend notification from Fiuu (if used).
     *
     * @param Request $request
     * @return array
     */
    public function handleBackendNotification(Request $request): array
    {
        // Similar to callback, but for server-to-server confirmation.
        return $this->handleCallback($request);
    }

    /**
     * Verify the payment signature (mock always returns true).
     *
     * @param array $params
     * @return bool
     */
    public function verifySignature(array $params): bool
    {
        // In mock, we always trust the request.
        // In real integration, you would compute the signature using merchant key.
        return true;
    }
}
